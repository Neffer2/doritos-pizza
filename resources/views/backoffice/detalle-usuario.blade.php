@extends('backoffice.layout')

@section('content')
<div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
    <h1 class="h2">Detalle del Usuario #{{ $usuario->id }}</h1>
    <div class="btn-toolbar mb-2 mb-md-0">
        <a href="{{ route('backoffice.informacion-usuarios') }}" class="btn btn-secondary">
            ← Volver a la lista
        </a>
    </div>
</div>

<div class="row">
    <!-- Información Personal -->
    <div class="col-md-8">
        <div class="card shadow mb-4">
            <div class="card-header">
                <h6 class="m-0 font-weight-bold text-primary">Información Personal</h6>
            </div>
            <div class="card-body">
                <div class="row">
                    <div class="col-md-6">
                        <table class="table table-borderless">
                            <tr>
                                <td><strong>Nombre:</strong></td>
                                <td>{{ $usuario->name }}</td>
                            </tr>
                            <tr>
                                <td><strong>Email:</strong></td>
                                <td>{{ $usuario->email }}</td>
                            </tr>
                            <tr>
                                <td><strong>Documento:</strong></td>
                                <td>{{ $usuario->document }}</td>
                            </tr>
                            <tr>
                                <td><strong>Celular:</strong></td>
                                <td>{{ $usuario->celular }}</td>
                            </tr>
                            <tr>
                                <td><strong>Fecha Nacimiento:</strong></td>
                                <td>{{ $usuario->fecha_nacimiento ? $usuario->fecha_nacimiento->format('d/m/Y') : 'N/A' }}</td>
                            </tr>
                        </table>
                    </div>
                    <div class="col-md-6">
                        <table class="table table-borderless">
                            <tr>
                                <td><strong>Departamento:</strong></td>
                                <td>{{ $usuario->departamento->descripcion ?? 'N/A' }}</td>
                            </tr>
                            <tr>
                                <td><strong>Ciudad:</strong></td>
                                <td>{{ $usuario->ciudad->descripcion ?? 'N/A' }}</td>
                            </tr>
                            <tr>
                                <td><strong>Localidad:</strong></td>
                                <td>{{ $usuario->localidad->nombre ?? 'N/A' }}</td>
                            </tr>
                            <tr>
                                <td><strong>Barrio:</strong></td>
                                <td>{{ $usuario->barrio->nombre ?? 'N/A' }}</td>
                            </tr>
                            <tr>
                                <td><strong>Dirección:</strong></td>
                                <td>{{ $usuario->direccion ?? 'N/A' }}</td>
                            </tr>
                        </table>
                    </div>
                </div>
            </div>
        </div>

        <!-- Códigos Registrados -->
        <div class="card shadow">
            <div class="card-header">
                <h6 class="m-0 font-weight-bold text-primary">
                    Códigos Registrados ({{ $codigosUsuario->count() }})
                </h6>
            </div>
            <div class="card-body">
                @if($codigosUsuario->count() > 0)
                    <div class="table-responsive">
                        <table class="table table-hover table-sm">
                            <thead class="table-light">
                                <tr>
                                    <th>Código</th>
                                    <th>Fecha Registro</th>
                                    <th>Canal</th>
                                    <th>Estado</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach($codigosUsuario as $registro)
                                    <tr>
                                        <td>
                                            <code>{{ $registro->codigo->description ?? 'N/A' }}</code>
                                        </td>
                                        <td>{{ $registro->created_at->format('d/m/Y H:i:s') }}</td>
                                        <td>{{ $registro->codigo->canal->description ?? 'N/A' }}</td>
                                        <td>
                                            <span class="badge bg-success">Registrado</span>
                                        </td>
                                    </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                @else
                    <div class="text-center py-4 text-muted">
                        <em>El usuario no ha registrado códigos</em>
                    </div>
                @endif
            </div>
        </div>
    </div>

    <!-- Panel Lateral -->
    <div class="col-md-4">
        <!-- Estado y Puntos -->
        <div class="card shadow mb-4">
            <div class="card-header">
                <h6 class="m-0 font-weight-bold text-primary">Estado y Puntos</h6>
            </div>
            <div class="card-body text-center">
                <div class="mb-3">
                    <span class="badge bg-{{ $usuario->estado_id == 1 ? 'success' : ($usuario->estado_id == 2 ? 'warning' : 'danger') }} fs-6">
                        {{ $usuario->estado->description ?? 'Sin estado' }}
                    </span>
                </div>
                <div class="mb-3">
                    <div class="h2 text-primary">{{ number_format($usuario->puntos) }}</div>
                    <small class="text-muted">Puntos acumulados</small>
                </div>
                
                {{-- <!-- Cambiar Estado -->
                <form method="POST" action="{{ route('backoffice.actualizar-estado', $usuario) }}" class="mt-3">
                    @csrf
                    @method('PATCH')
                    <div class="mb-2">
                        <label for="estado_id" class="form-label">Cambiar Estado:</label>
                        <select name="estado_id" id="estado_id" class="form-select">
                            @foreach(\App\Models\Estado::all() as $estado)
                                <option value="{{ $estado->id }}" 
                                        {{ $usuario->estado_id == $estado->id ? 'selected' : '' }}>
                                    {{ $estado->description }}
                                </option>
                            @endforeach
                        </select>
                    </div>
                    <button type="submit" class="btn btn-primary btn-sm">Actualizar Estado</button>
                </form> --}}
            </div>
        </div>

        <!-- Información de Registro -->
        <div class="card shadow mb-4">
            <div class="card-header">
                <h6 class="m-0 font-weight-bold text-primary">Información de Registro</h6>
            </div>
            <div class="card-body">
                <table class="table table-borderless table-sm">
                    <tr>
                        <td><strong>Registrado:</strong></td>
                        <td>{{ $usuario->created_at->format('d/m/Y H:i') }}</td>
                    </tr>
                    <tr>
                        <td><strong>Última actualización:</strong></td>
                        <td>{{ $usuario->updated_at->format('d/m/Y H:i') }}</td>
                    </tr>
                    <tr>
                        <td><strong>Términos aceptados:</strong></td>
                        <td>
                            <span class="badge bg-{{ $usuario->terminos ? 'success' : 'danger' }}">
                                {{ $usuario->terminos ? 'Sí' : 'No' }}
                            </span>
                        </td>
                    </tr>
                    <tr>
                        <td><strong>Habeas Data:</strong></td>
                        <td>
                            <span class="badge bg-{{ $usuario->habeas_data ? 'success' : 'danger' }}">
                                {{ $usuario->habeas_data ? 'Sí' : 'No' }}
                            </span>
                        </td>
                    </tr>
                </table>
            </div>
        </div>

        <!-- Estadísticas del Usuario -->
        <div class="card shadow">
            <div class="card-header">
                <h6 class="m-0 font-weight-bold text-primary">Estadísticas</h6>
            </div>
            <div class="card-body">
                <div class="text-center">
                    <div class="row">
                        <div class="col-6">
                            <div class="h4 text-info">{{ $codigosUsuario->count() }}</div>
                            <small class="text-muted">Códigos</small>
                        </div>
                        <div class="col-6">
                            <div class="h4 text-warning">
                                {{ $usuario->created_at->diffInDays(now()) }}
                            </div>
                            <small class="text-muted">Días registrado</small>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
