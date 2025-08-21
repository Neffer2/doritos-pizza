@extends('backoffice.layout')

@section('content')
<div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
    <h1 class="h2">Ranking de Usuarios</h1>
    <div class="btn-toolbar mb-2 mb-md-0">
        <form method="GET" action="{{ route('backoffice.ranking') }}" class="d-flex">
            <select name="per_page" class="form-select form-select-sm me-2" onchange="this.form.submit()">
                <option value="25" {{ request('per_page') == 25 ? 'selected' : '' }}>25 por página</option>
                <option value="50" {{ request('per_page') == 50 ? 'selected' : '' }}>50 por página</option>
                <option value="100" {{ request('per_page') == 100 ? 'selected' : '' }}>100 por página</option>
            </select>
        </form>
    </div>
</div>

<div class="card shadow">
    <div class="card-header">
        <h6 class="m-0 font-weight-bold text-primary">
            Total de usuarios: {{ $ranking->total() }}
        </h6>
    </div>
    <div class="card-body">
        <div class="table-responsive">
            <table class="table table-hover">
                <thead class="table-dark">
                    <tr>
                        <th>Posición</th>
                        <th>Nombre</th>
                        <th>Email</th>
                        <th>Puntos</th>
                        <th>Departamento</th>
                        <th>Ciudad</th>
                        <th>Estado</th>
                        <th>Fecha Registro</th>
                        <th>Acciones</th>
                    </tr>
                </thead>
                <tbody>
                    @forelse($ranking as $index => $usuario)
                        <tr>
                            <td>
                                <strong>
                                    {{ ($ranking->currentPage() - 1) * $ranking->perPage() + $index + 1 }}
                                    @if($index + 1 <= 3 && $ranking->currentPage() == 1)
                                        @if($index + 1 == 1) 🥇
                                        @elseif($index + 1 == 2) 🥈
                                        @elseif($index + 1 == 3) 🥉
                                        @endif
                                    @endif
                                </strong>
                            </td>
                            <td>{{ $usuario->name }}</td>
                            <td>{{ $usuario->email }}</td>
                            <td>
                                <span class="badge bg-primary fs-6">
                                    {{ number_format($usuario->puntos) }} pts
                                </span>
                            </td>
                            <td>{{ $usuario->departamento->nombre ?? 'N/A' }}</td>
                            <td>{{ $usuario->ciudad->nombre ?? 'N/A' }}</td>
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
                            <td colspan="9" class="text-center py-4">
                                <em>No hay usuarios registrados</em>
                            </td>
                        </tr>
                    @endforelse
                </tbody>
            </table>
        </div>

        <!-- Paginación -->
        <div class="d-flex justify-content-center">
            {{ $ranking->appends(request()->query())->links() }}
        </div>
    </div>
</div>
@endsection
