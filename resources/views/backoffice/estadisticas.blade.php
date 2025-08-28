@extends('backoffice.layout')

@section('content')
<div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
    <h1 class="h2">Estadísticas</h1>
</div>

<div class="row">
    <!-- Estadísticas por Estado -->
    <div class="col-md-6 mb-4">
        <div class="card shadow">
            <div class="card-header">
                <h6 class="m-0 font-weight-bold text-primary">Usuarios por Estado</h6>
            </div>
            <div class="card-body">
                <div class="table-responsive">
                    <table class="table table-sm">
                        <thead>
                            <tr>
                                <th>Estado</th>
                                <th>Cantidad</th>
                                <th>Porcentaje</th>
                            </tr>
                        </thead>
                        <tbody>
                            @php $total = $estadisticasEstado->sum('total'); @endphp
                            @foreach($estadisticasEstado as $stat)
                                <tr>
                                    <td>{{ $stat->estado->description ?? 'Sin estado' }}</td>
                                    <td>{{ number_format($stat->total) }}</td>
                                    <td>
                                        <span class="badge bg-info">
                                            {{ $total > 0 ? round(($stat->total / $total) * 100, 2) : 0 }}%
                                        </span>
                                    </td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>

    <!-- Top Ciudades -->
    <div class="col-md-6 mb-4">
        <div class="card shadow">
            <div class="card-header">
                <h6 class="m-0 font-weight-bold text-primary">Top 10 Ciudades</h6>
            </div>
            <div class="card-body">
                <div class="table-responsive">
                    <table class="table table-sm">
                        <thead>
                            <tr>
                                <th>Ciudad</th>
                                <th>Usuarios</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach($estadisticasCiudad as $stat)
                                <tr>
                                    <td>{{ $stat->ciudad->descripcion ?? 'Sin ciudad' }}</td>
                                    <td>
                                        <span class="badge bg-primary">
                                            {{ number_format($stat->total) }}
                                        </span>
                                    </td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</div>

<div class="row">
    <!-- Registros por Mes -->
    <div class="col-md-8 mb-4">
        <div class="card shadow">
            <div class="card-header">
                <h6 class="m-0 font-weight-bold text-primary">Registros por Mes</h6>
            </div>
            <div class="card-body">
                <div class="table-responsive">
                    <table class="table table-sm">
                        <thead>
                            <tr>
                                <th>Año</th>
                                <th>Mes</th>
                                <th>Registros</th>
                                <th>Gráfico</th>
                            </tr>
                        </thead>
                        <tbody>
                            @php $maxRegistros = $registrosPorMes->max('total'); @endphp
                            @foreach($registrosPorMes as $registro)
                                <tr>
                                    <td>{{ $registro->año }}</td>
                                    <td>
                                        @php
                                            $meses = [
                                                1 => 'Enero', 2 => 'Febrero', 3 => 'Marzo', 4 => 'Abril',
                                                5 => 'Mayo', 6 => 'Junio', 7 => 'Julio', 8 => 'Agosto',
                                                9 => 'Septiembre', 10 => 'Octubre', 11 => 'Noviembre', 12 => 'Diciembre'
                                            ];
                                        @endphp
                                        {{ $meses[$registro->mes] }}
                                    </td>
                                    <td>
                                        <span class="badge bg-success">
                                            {{ number_format($registro->total) }}
                                        </span>
                                    </td>
                                    <td>
                                        <div class="progress" style="height: 20px;">
                                            <div class="progress-bar" role="progressbar" 
                                                 style="width: {{ $maxRegistros > 0 ? ($registro->total / $maxRegistros) * 100 : 0 }}%">
                                            </div>
                                        </div>
                                    </td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>

    <!-- Top Usuarios por Puntos -->
    <div class="col-md-4 mb-4">
        <div class="card shadow">
            <div class="card-header">
                <h6 class="m-0 font-weight-bold text-primary">Top 10 Usuarios por Puntos</h6>
            </div>
            <div class="card-body">
                <div class="table-responsive">
                    <table class="table table-sm">
                        <thead>
                            <tr>
                                <th>Pos.</th>
                                <th>Usuario</th>
                                <th>Puntos</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach($topUsuarios as $index => $usuario)
                                <tr>
                                    <td>
                                        {{ $index + 1 }}
                                        @if($index + 1 <= 3)
                                            @if($index + 1 == 1) 🥇
                                            @elseif($index + 1 == 2) 🥈
                                            @elseif($index + 1 == 3) 🥉
                                            @endif
                                        @endif
                                    </td>
                                    <td>{{ Str::limit($usuario->name, 15) }}</td>
                                    <td>
                                        <span class="badge bg-warning text-dark">
                                            {{ number_format($usuario->puntos) }}
                                        </span>
                                    </td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</div>

<!-- Resumen General -->
<div class="row">
    <div class="col-12">
        <div class="card shadow">
            <div class="card-header">
                <h6 class="m-0 font-weight-bold text-primary">Resumen General</h6>
            </div>
            <div class="card-body">
                <div class="row text-center">
                    <div class="col-md-3">
                        <div class="h4 text-primary">{{ number_format($estadisticasEstado->sum('total')) }}</div>
                        <small class="text-muted">Total Usuarios</small>
                    </div>
                    <div class="col-md-3">
                        <div class="h4 text-success">{{ number_format($topUsuarios->sum('puntos')) }}</div>
                        <small class="text-muted">Puntos Top 10</small>
                    </div>
                    <div class="col-md-3">
                        <div class="h4 text-info">{{ $estadisticasCiudad->count() }}</div>
                        <small class="text-muted">Ciudades Activas</small>
                    </div>
                    <div class="col-md-3">
                        <div class="h4 text-warning">{{ $registrosPorMes->first()->total ?? 0 }}</div>
                        <small class="text-muted">Registros Este Mes</small>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
