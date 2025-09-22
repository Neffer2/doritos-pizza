@extends('backoffice.layout')
@section('content')
<div class="container mt-4">
    <h2 class="mb-4">Ganadores por Bloque Semanal</h2>
    <form method="GET" class="mb-3">
        <div class="row g-2 align-items-end">
            <div class="col-md-4">
                <label for="bloque" class="form-label">Selecciona el bloque:</label>
                <select name="bloque" id="bloque" class="form-select" onchange="this.form.submit()">
                    @foreach($bloques as $i => $b)
                        <option value="{{ $i }}" {{ $bloqueSeleccionado == $i ? 'selected' : '' }}>{{ $b['nombre'] }} ({{ \Carbon\Carbon::parse($b['inicio'])->format('d/m/Y') }} - {{ \Carbon\Carbon::parse($b['fin'])->format('d/m/Y') }})</option>
                    @endforeach
                </select>
            </div>
            <div class="col-md-4">
                <span class="fw-bold">Ganadores:</span> {{ $bloque['ganadores'] }}
            </div>
        </div>
    </form>
    <div class="table-responsive mt-3">
        <table class="table table-bordered table-striped">
            <thead class="table-dark">
                <tr>
                    <th>#</th>
                    <th>Nombre</th>
                    <th>Celular</th>
                    <th>Email</th>
                    <th>Departamento</th>
                    <th>Ciudad</th>
                    <th>Localidad</th>
                    <th>Barrio</th>
                    <th>Dirección</th>
                    <th>Puntos</th>
                    <th>Fecha Registro 1er Código</th>
                </tr>
            </thead>
            <tbody>
                @forelse($ganadores as $i => $user)
                    <tr>
                        <td>{{ $i+1 }}</td>
                        <td>{{ $user->name }}</td>
                        <td>{{ $user->celular }}</td>
                        <td>{{ $user->email }}</td>
                        <td>{{ $user->departamento->descripcion ?? 'N/A' }}</td>
                        <td>{{ $user->ciudad->descripcion ?? 'N/A' }}</td>
                        <td>{{ $user->localidad->nombre ?? 'N/A' }}</td>
                        <td>{{ $user->barrio->nombre ?? 'N/A' }}</td>
                        <td>{{ $user->direccion }}</td>
                        <td>{{ $user->puntos }}</td>
                        <td>{{ $user->primera_participacion ? \Carbon\Carbon::parse($user->primera_participacion)->format('d/m/Y H:i') : 'N/A' }}</td>
                    </tr>
                @empty
                    <tr>
                        <td colspan="10" class="text-center">No hay ganadores para este bloque.</td>
                    </tr>
                @endforelse
            </tbody>
        </table>
    </div>
</div>
@endsection
