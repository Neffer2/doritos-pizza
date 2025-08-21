<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Symfony\Component\HttpFoundation\Response;

class BackofficeMiddleware
{
    /**
     * Handle an incoming request.
     *
     * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
     */
    public function handle(Request $request, Closure $next): Response
    {
        // Verificar que el usuario esté autenticado
        if (!Auth::check()) {
            return redirect()->route('login');
        }

        // Verificar que el usuario tenga estado_id = 5 (administrador de backoffice)
        $user = Auth::user();
        if ($user->estado_id !== 5) {
            return redirect()->route('dashboard')->with('error', 'No tienes permisos para acceder al backoffice.');
        }

        return $next($request);
    }
}
