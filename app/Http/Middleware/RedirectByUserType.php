<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Symfony\Component\HttpFoundation\Response;

class RedirectByUserType
{
    /**
     * Handle an incoming request.
     *
     * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
     */
    public function handle(Request $request, Closure $next): Response
    {
        // Si no está autenticado, continuar normal
        if (!Auth::check()) {
            return $next($request);
        }

        $user = Auth::user();
        $currentRoute = $request->route()->getName();
        $isBackofficeRoute = str_starts_with($request->getPathInfo(), '/backoffice');
        
        // Lista de rutas públicas de la plataforma normal
        $publicRoutes = ['dashboard', 'premios', 'puntaje', 'ranking', 'registrar_codigo', 'faq', 'ruleta', 'profile.edit', 'profile.update', 'profile.destroy'];

        // Si el usuario tiene estado_id = 5 (backoffice)
        if ($user->estado_id === 5) {
            // Si está intentando acceder a rutas públicas, redirigir al backoffice
            if (in_array($currentRoute, $publicRoutes) && !$isBackofficeRoute) {
                return redirect()->route('backoffice.dashboard');
            }
        } else {
            // Si el usuario NO es de backoffice pero intenta acceder al backoffice
            if ($isBackofficeRoute) {
                return redirect()->route('dashboard');
            }
        }

        return $next($request);
    }
}
