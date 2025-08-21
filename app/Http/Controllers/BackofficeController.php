<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Models\Estado;
use App\Models\RegistroCodigo;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class BackofficeController extends Controller
{
    /**
     * Dashboard principal del backoffice
     */
    public function dashboard()
    {
        $totalUsuarios = User::count();
        $usuariosActivos = User::whereHas('estado', function($query) {
            $query->where('description', 'like', '%activo%');
        })->count();
        
        $codigosRegistrados = RegistroCodigo::count();
        
        return view('backoffice.dashboard', compact('totalUsuarios', 'usuariosActivos', 'codigosRegistrados'));
    }

    /**
     * Mostrar ranking actual
     */
    public function ranking(Request $request)
    {
        $perPage = $request->get('per_page', 50);
        
        $ranking = User::select('users.*')
            ->with(['departamento', 'ciudad', 'localidad', 'barrio', 'estado'])
            ->orderBy('puntos', 'desc')
            ->orderBy('created_at', 'asc')
            ->paginate($perPage);

        return view('backoffice.ranking', compact('ranking'));
    }

    /**
     * Mostrar estado de usuarios
     */
    public function estadoUsuarios(Request $request)
    {
        $estadoFiltro = $request->get('estado');
        $busqueda = $request->get('search');
        $perPage = $request->get('per_page', 50);

        $query = User::with(['departamento', 'ciudad', 'localidad', 'barrio', 'estado']);

        if ($estadoFiltro) {
            $query->where('estado_id', $estadoFiltro);
        }

        if ($busqueda) {
            $query->where(function($q) use ($busqueda) {
                $q->where('name', 'like', "%{$busqueda}%")
                  ->orWhere('email', 'like', "%{$busqueda}%")
                  ->orWhere('document', 'like', "%{$busqueda}%")
                  ->orWhere('celular', 'like', "%{$busqueda}%");
            });
        }

        $usuarios = $query->orderBy('created_at', 'desc')->paginate($perPage);
        $estados = Estado::all();

        return view('backoffice.estado-usuarios', compact('usuarios', 'estados', 'estadoFiltro', 'busqueda'));
    }

    /**
     * Información básica de usuarios
     */
    public function informacionUsuarios(Request $request)
    {
        $busqueda = $request->get('search');
        $perPage = $request->get('per_page', 50);

        $query = User::select([
            'id', 'name', 'email', 'document', 'celular', 
            'fecha_nacimiento', 'departamento_id', 'ciudad_id', 
            'localidad_id', 'barrio_id', 'direccion', 'puntos', 
            'estado_id', 'created_at'
        ])->with(['departamento', 'ciudad', 'localidad', 'barrio', 'estado']);

        if ($busqueda) {
            $query->where(function($q) use ($busqueda) {
                $q->where('name', 'like', "%{$busqueda}%")
                  ->orWhere('email', 'like', "%{$busqueda}%")
                  ->orWhere('document', 'like', "%{$busqueda}%")
                  ->orWhere('celular', 'like', "%{$busqueda}%");
            });
        }

        $usuarios = $query->orderBy('created_at', 'desc')->paginate($perPage);

        return view('backoffice.informacion-usuarios', compact('usuarios', 'busqueda'));
    }

    /**
     * Estadísticas generales
     */
    public function estadisticas()
    {
        // Estadísticas por estado
        $estadisticasEstado = User::select('estado_id')
            ->selectRaw('COUNT(*) as total')
            ->with('estado')
            ->groupBy('estado_id')
            ->get();

        // Estadísticas por ciudad
        $estadisticasCiudad = User::select('ciudad_id')
            ->selectRaw('COUNT(*) as total')
            ->with('ciudad')
            ->groupBy('ciudad_id')
            ->orderBy('total', 'desc')
            ->limit(10)
            ->get();

        // Registros por mes
        $registrosPorMes = User::select(
            DB::raw('YEAR(created_at) as año'),
            DB::raw('MONTH(created_at) as mes'),
            DB::raw('COUNT(*) as total')
        )
        ->groupBy('año', 'mes')
        ->orderBy('año', 'desc')
        ->orderBy('mes', 'desc')
        ->limit(12)
        ->get();

        // Top usuarios por puntos
        $topUsuarios = User::select('name', 'email', 'puntos')
            ->orderBy('puntos', 'desc')
            ->limit(10)
            ->get();

        return view('backoffice.estadisticas', compact(
            'estadisticasEstado', 
            'estadisticasDepartamento', 
            'registrosPorMes', 
            'topUsuarios'
        ));
    }

    /**
     * Actualizar estado de usuario
     */
    public function actualizarEstado(Request $request, User $usuario)
    {
        $request->validate([
            'estado_id' => 'required|exists:estados,id'
        ]);

        $usuario->update([
            'estado_id' => $request->estado_id
        ]);

        return back()->with('success', 'Estado del usuario actualizado correctamente.');
    }

    /**
     * Ver detalle de usuario
     */
    public function verUsuario(User $usuario)
    {
        $usuario->load(['departamento', 'ciudad', 'localidad', 'barrio', 'estado']);
        
        // Obtener códigos registrados por el usuario
        $codigosUsuario = RegistroCodigo::where('user_id', $usuario->id)
            ->with(['codigo.canal', 'codigo.estado'])
            ->orderBy('created_at', 'desc')
            ->get();

        return view('backoffice.detalle-usuario', compact('usuario', 'codigosUsuario'));
    }
}
