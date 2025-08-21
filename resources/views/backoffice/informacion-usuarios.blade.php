@extends('backoffice.layout')

@section('content')
<div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
    <h1 class="h2">Información de Usuarios</h1>
</div>

<!-- Filtros -->
<div class="card shadow mb-4">
    <div class="card-header">
        <h6 class="m-0 font-weight-bold text-primary">Buscar Usuario</h6>
    </div>
    <div class="card-body">
        <form method="GET" action="{{ route('backoffice.informacion-usuarios') }}" class="row g-3">
            <div class="col-md-6">
                <input type="text" name="search" class="form-control" 
                       placeholder="Buscar por nombre, email, documento o celular" 
                       value="{{ request('search') }}">
            </div>
            <div class="col-md-2">
                <select name="per_page" class="form-select">
                    <option value="25" {{ request('per_page') == 25 ? 'selected' : '' }}>25 por página</option>
                    <option value="50" {{ request('per_page') == 50 ? 'selected' : '' }}>50 por página</option>
                    <option value="100" {{ request('per_page') == 100 ? 'selected' : '' }}>100 por página</option>
                </select>
            </div>
            <div class="col-md-4">
                <div class="d-flex gap-2">
                    <button type="submit" class="btn btn-primary">Buscar</button>
                    <a href="{{ route('backoffice.informacion-usuarios') }}" class="btn btn-secondary">Limpiar</a>
                    {{-- <button type="button" class="btn btn-success" onclick="exportarDatos()">Exportar CSV</button> --}}
                </div>
            </div>
        </form>
    </div>
</div>

<!-- Tabla de información -->
<div class="card shadow">
    <div class="card-header">
        <h6 class="m-0 font-weight-bold text-primary">
            Total de usuarios: {{ $usuarios->total() }}
        </h6>
    </div>
    <div class="card-body">
        <div class="table-responsive">
            <table class="table table-hover table-sm">
                <thead class="table-dark">
                    <tr>
                        <th>ID</th>
                        <th>Nombre</th>
                        <th>Email</th>
                        <th>Documento</th>
                        <th>Celular</th>
                        <th>Fecha Nacimiento</th>
                        <th>Departamento</th>
                        <th>Ciudad</th>
                        <th>Localidad</th>
                        <th>Barrio</th>
                        <th>Dirección</th>
                        <th>Puntos</th>
                        <th>Estado</th>
                        <th>Registro</th>
                        <th>Acciones</th>
                    </tr>
                </thead>
                <tbody>
                    @forelse($usuarios as $usuario)
                        <tr>
                            <td>{{ $usuario->id }}</td>
                            <td>{{ $usuario->name }}</td>
                            <td>{{ $usuario->email }}</td>
                            <td>{{ $usuario->document }}</td>
                            <td>{{ $usuario->celular }}</td>
                            <td>{{ $usuario->fecha_nacimiento ? $usuario->fecha_nacimiento->format('d/m/Y') : 'N/A' }}</td>
                            <td>{{ $usuario->departamento->nombre ?? 'N/A' }}</td>
                            <td>{{ $usuario->ciudad->nombre ?? 'N/A' }}</td>
                            <td>{{ $usuario->localidad->nombre ?? 'N/A' }}</td>
                            <td>{{ $usuario->barrio->nombre ?? 'N/A' }}</td>
                            <td>{{ Str::limit($usuario->direccion, 30) ?? 'N/A' }}</td>
                            <td>
                                <span class="badge bg-primary">
                                    {{ number_format($usuario->puntos) }}
                                </span>
                            </td>
                            <td>
                                <span class="badge bg-{{ $usuario->estado_id == 1 ? 'success' : ($usuario->estado_id == 2 ? 'warning' : 'danger') }}">
                                    {{ $usuario->estado->description ?? 'N/A' }}
                                </span>
                            </td>
                            <td>{{ $usuario->created_at->format('d/m/Y H:i') }}</td>
                            <td>
                                <a href="{{ route('backoffice.ver-usuario', $usuario) }}" 
                                   class="btn btn-sm btn-outline-primary">
                                    Ver
                                </a>
                            </td>
                        </tr>
                    @empty
                        <tr>
                            <td colspan="15" class="text-center py-4">
                                <em>No se encontraron usuarios</em>
                            </td>
                        </tr>
                    @endforelse
                </tbody>
            </table>
        </div>

        <!-- Paginación -->
        <div class="d-flex justify-content-center">
            {{ $usuarios->appends(request()->query())->links() }}
        </div>
    </div>
</div>

{{-- <script>
function exportarDatos() {
    // Construir URL con parámetros actuales
    const params = new URLSearchParams(window.location.search);
    params.set('export', 'csv');
    
    // Crear link temporal para descargar
    const link = document.createElement('a');
    link.href = window.location.pathname + '?' + params.toString();
    link.download = 'usuarios_' + new Date().toISOString().split('T')[0] + '.csv';
    link.click();
}
</script> --}}
@endsection
