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
                    <th>Email</th>
                    <th>Puntos</th>
                    <th>Fecha Registro</th>
                </tr>
            </thead>
            <tbody>
                @forelse($ganadores as $i => $user)
                    <tr>
                        <td>{{ $i+1 }}</td>
                        <td>{{ $user->name }}</td>
                        <td>{{ $user->email }}</td>
                        <td>{{ $user->puntos }}</td>
                        <td>{{ $user->created_at->format('d/m/Y H:i') }}</td>
                    </tr>
                @empty
                    <tr>
                        <td colspan="5" class="text-center">No hay ganadores para este bloque.</td>
                    </tr>
                @endforelse
            </tbody>
        </table>
    </div>
</div>
@endsection
