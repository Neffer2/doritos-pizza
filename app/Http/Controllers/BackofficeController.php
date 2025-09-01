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
     * Estadística de cantidad de códigos por canal
     */
    public function codigosPorCanal()
    {

        // Solución: agrupar por todos los campos de canales para evitar el error SQL
        $canales = \App\Models\Canal::select('canales.id', 'canales.description', 'canales.created_at', 'canales.updated_at')
            ->leftJoin('codigos', 'canales.id', '=', 'codigos.canal_id')
            ->leftJoin('registro_codigos', 'codigos.id', '=', 'registro_codigos.codigo_id')
            ->groupBy('canales.id', 'canales.description', 'canales.created_at', 'canales.updated_at')
            ->selectRaw('COUNT(registro_codigos.id) as registros_count')
            ->get();

        // Para gráfico: nombres y cantidades
        $labels = $canales->pluck('description')->toArray();
        $data = $canales->pluck('registros_count')->toArray();

        $totalRegistros = array_sum($data);

        return view('backoffice.codigos-por-canal', compact('canales', 'labels', 'data', 'totalRegistros'));
    }
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
            'estadisticasCiudad', 
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

    public function ganadoresPorBloque(Request $request)
    {
        // Definición de bloques (puedes mover esto a config si lo prefieres)
        $bloques = [
            [
                'nombre' => 'Bloque 1',
                'inicio' => '2025-08-18 00:00:00',
                'fin' => '2025-08-31 23:59:59',
                'ganadores' => 200
            ],
            [
                'nombre' => 'Bloque 2',
                'inicio' => '2025-09-01 00:00:00',
                'fin' => '2025-09-07 23:59:59',
                'ganadores' => 100
            ],
            [
                'nombre' => 'Bloque 3',
                'inicio' => '2025-09-08 00:00:00',
                'fin' => '2025-09-14 23:59:59',
                'ganadores' => 200
            ],
            [
                'nombre' => 'Bloque 4',
                'inicio' => '2025-09-15 00:00:00',
                'fin' => '2025-09-21 23:59:59',
                'ganadores' => 200
            ],
            [
                'nombre' => 'Bloque 5',
                'inicio' => '2025-09-22 00:00:00',
                'fin' => '2025-09-28 23:59:59',
                'ganadores' => 300
            ],
            [
                'nombre' => 'Bloque 6',
                'inicio' => '2025-09-29 00:00:00',
                'fin' => '2025-10-05 23:59:59',
                'ganadores' => 350
            ],
            [
                'nombre' => 'Bloque 7',
                'inicio' => '2025-10-06 00:00:00',
                'fin' => '2025-10-12 23:59:59',
                'ganadores' => 400
            ],
            [
                'nombre' => 'Bloque 8',
                'inicio' => '2025-10-13 00:00:00',
                'fin' => '2025-10-19 23:59:59',
                'ganadores' => 400
            ],
            [
                'nombre' => 'Bloque 9',
                'inicio' => '2025-10-20 00:00:00',
                'fin' => '2025-10-26 23:59:59',
                'ganadores' => 400
            ],
            [
                'nombre' => 'Bloque 10',
                'inicio' => '2025-10-27 00:00:00',
                'fin' => '2025-11-02 23:59:59',
                'ganadores' => 450
            ],
        ];

        $bloqueSeleccionado = $request->get('bloque', 0);
        $bloque = $bloques[$bloqueSeleccionado] ?? $bloques[0];

        // Obtener el primer registro de código de cada usuario
        $primerosCodigos = RegistroCodigo::select('user_id', DB::raw('MIN(created_at) as primera_participacion'))
            ->groupBy('user_id')
            ->get();

        // Filtrar usuarios cuyo primer código está dentro del rango del bloque
        $usuariosCandidatos = $primerosCodigos->filter(function($registro) use ($bloque) {
            return $registro->primera_participacion >= $bloque['inicio'] && $registro->primera_participacion <= $bloque['fin'];
        })->pluck('user_id')->toArray();

        // Excluir usuarios que ya ganaron en otros bloques (a futuro, tabla ganadores_bloques)
        // $yaGanaron = GanadorBloque::pluck('user_id')->toArray();
        // $usuariosCandidatos = array_diff($usuariosCandidatos, $yaGanaron);

        $ganadores = User::with(['ciudad', 'localidad', 'barrio'])
            ->whereIn('id', $usuariosCandidatos)
            ->where('puntos', '>', 0)
            ->orderBy('puntos', 'desc')
            ->limit($bloque['ganadores'])
            ->get();

        // Mapear la fecha de primer registro de código a cada usuario
        $primerosCodigosMap = $primerosCodigos->keyBy('user_id');
        $ganadores->transform(function($user) use ($primerosCodigosMap) {
            $user->primera_participacion = $primerosCodigosMap[$user->id]->primera_participacion ?? null;
            return $user;
        });

        return view('backoffice.ganadores-bloque', compact('bloques', 'bloqueSeleccionado', 'bloque', 'ganadores'));
    }
}
