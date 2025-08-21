@extends('backoffice.layout')

@section('content')
<div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
    <h1 class="h2">Estado de Usuarios</h1>
</div>

<!-- Filtros -->
<div class="card shadow mb-4">
    <div class="card-header">
        <h6 class="m-0 font-weight-bold text-primary">Filtros</h6>
    </div>
    <div class="card-body">
        <form method="GET" action="{{ route('backoffice.estado-usuarios') }}" class="row g-3">
            <div class="col-md-3">
                <label for="estado" class="form-label">Estado</label>
                <select name="estado" id="estado" class="form-select">
                    <option value="">Todos los estados</option>
                    @foreach($estados as $estado)
                        <option value="{{ $estado->id }}" {{ request('estado') == $estado->id ? 'selected' : '' }}>
                            {{ $estado->description }}
                        </option>
                    @endforeach
                </select>
            </div>
            <div class="col-md-4">
                <label for="search" class="form-label">Buscar</label>
                <input type="text" name="search" id="search" class="form-control" 
                       placeholder="Nombre, email, documento o celular" value="{{ request('search') }}">
            </div>
            <div class="col-md-2">
                <label for="per_page" class="form-label">Por página</label>
                <select name="per_page" id="per_page" class="form-select">
                    <option value="25" {{ request('per_page') == 25 ? 'selected' : '' }}>25</option>
                    <option value="50" {{ request('per_page') == 50 ? 'selected' : '' }}>50</option>
                    <option value="100" {{ request('per_page') == 100 ? 'selected' : '' }}>100</option>
                </select>
            </div>
            <div class="col-md-3">
                <label class="form-label">&nbsp;</label>
                <div class="d-flex gap-2">
                    <button type="submit" class="btn btn-primary">Filtrar</button>
                    <a href="{{ route('backoffice.estado-usuarios') }}" class="btn btn-secondary">Limpiar</a>
                </div>
            </div>
        </form>
    </div>
</div>

<!-- Tabla de usuarios -->
<div class="card shadow">
    <div class="card-header">
        <h6 class="m-0 font-weight-bold text-primary">
            Usuarios encontrados: {{ $usuarios->total() }}
        </h6>
    </div>
    <div class="card-body">
        <div class="table-responsive">
            <table class="table table-hover">
                <thead class="table-dark">
                    <tr>
                        <th>ID</th>
                        <th>Nombre</th>
                        <th>Email</th>
                        <th>Documento</th>
                        <th>Celular</th>
                        <th>Estado Actual</th>
                        <th>Puntos</th>
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
                            <td>
                                <form method="POST" action="{{ route('backoffice.actualizar-estado', $usuario) }}" 
                                      class="d-inline" id="form-estado-{{ $usuario->id }}">
                                    @csrf
                                    @method('PATCH')
                                    <select name="estado_id" class="form-select form-select-sm" 
                                            onchange="document.getElementById('form-estado-{{ $usuario->id }}').submit()">
                                        @foreach($estados as $estado)
                                            <option value="{{ $estado->id }}" 
                                                    {{ $usuario->estado_id == $estado->id ? 'selected' : '' }}>
                                                {{ $estado->description }}
                                            </option>
                                        @endforeach
                                    </select>
                                </form>
                            </td>
                            <td>
                                <span class="badge bg-info">
                                    {{ number_format($usuario->puntos) }}
                                </span>
                            </td>
                            <td>{{ $usuario->created_at->format('d/m/Y') }}</td>
                            <td>
                                <a href="{{ route('backoffice.ver-usuario', $usuario) }}" 
                                   class="btn btn-sm btn-outline-primary">
                                    Ver detalle
                                </a>
                            </td>
                        </tr>
                    @empty
                        <tr>
                            <td colspan="9" class="text-center py-4">
                                <em>No se encontraron usuarios con los filtros aplicados</em>
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
@endsection
