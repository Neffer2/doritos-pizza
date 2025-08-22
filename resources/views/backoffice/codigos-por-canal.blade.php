@extends('backoffice.layout')

@section('content')
<div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
    <h1 class="h2">Códigos por Canal</h1>
</div>

<div class="row mb-4">
    <div class="col-md-8">
        <div class="card shadow">
            <div class="card-header">
                <h6 class="m-0 font-weight-bold text-primary">Estadística por canal</h6>
            </div>
            <div class="card-body">
                <canvas id="canalesChart" height="120"></canvas>
            </div>
        </div>
    </div>
    <div class="col-md-4">
        <div class="card shadow">
            <div class="card-header">
                <h6 class="m-0 font-weight-bold text-primary">Resumen</h6>
            </div>
            <div class="card-body">
                <ul class="list-group">
                    <li class="list-group-item d-flex justify-content-between align-items-center">
                        <strong>Total de códigos registrados</strong>
                        <span class="badge bg-primary">{{ $totalRegistros }}</span>
                    </li>
                    @foreach($canales as $canal)
                        <li class="list-group-item d-flex justify-content-between align-items-center">
                            {{ $canal->description }}
                            <span class="badge bg-info">{{ $canal->registros_count }}</span>
                        </li>
                    @endforeach
                </ul>
            </div>
        </div>
    </div>
</div>

<div class="card shadow mb-4">
    <div class="card-header">
        <h6 class="m-0 font-weight-bold text-primary">Detalle por canal</h6>
    </div>
    <div class="card-body">
        <div class="table-responsive">
            <table class="table table-hover">
                <thead class="table-dark">
                    <tr>
                        <th>Canal</th>
                        <th>Códigos</th>
                        <th>Porcentaje</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($canales as $canal)
                        <tr>
                            <td>{{ $canal->description }}</td>
                            <td>{{ $canal->registros_count }}</td>
                            <td>
                                <span class="badge bg-success">
                                    {{ $totalRegistros > 0 ? round(($canal->registros_count / $totalRegistros) * 100, 2) : 0 }}%
                                </span>
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>
</div>

<!-- Chart.js -->
<script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
<script>
    const ctx = document.getElementById('canalesChart').getContext('2d');
    const canalesChart = new Chart(ctx, {
        type: 'bar',
        data: {
            labels: @json($labels),
            datasets: [{
                label: 'Códigos registrados',
                data: @json($data),
                backgroundColor: 'rgba(54, 162, 235, 0.6)',
                borderColor: 'rgba(54, 162, 235, 1)',
                borderWidth: 1
            }]
        },
        options: {
            responsive: true,
            plugins: {
                legend: { display: false },
                title: {
                    display: true,
                    text: 'Códigos registrados por Canal'
                }
            },
            scales: {
                y: {
                    beginAtZero: true,
                    precision: 0
                }
            }
        }
    });
</script>
@endsection
