@extends('layouts.app')

@section('content')

@section('css')
    @include('layouts.datatables_css')
@endsection
    <div class="content">
        <div class="box box-danger">
            <div class="box-body">
                <div class="content">
                    @include('evaluacions.show_fields')
                    <a href="javascript:history.back()" class="btn btn-default">Atrás</a>
                </div>
            </div>
        </div>
    </div>

@section('scripts')
    @include('layouts.datatables_js')

    <script>
        var tipos_tareas=[];
        var calificacion=[];
        $(document).ready(function() {

        var tipos_tareas = <?php echo json_encode($tipos_tareas_graf) ?> ;
        var calificacion = <?php echo json_encode($calificacion_graf) ?> ;

        generarGrafica();
        function generarGrafica(){
            var ctx = document.getElementById('rendimiento').getContext('2d');
            var myChart = new Chart(ctx, {
            type: 'radar',
            data: {
                labels: tipos_tareas,
                datasets: [{
                    label: 'Tipos de tareas',
                    data: calificacion,
                    backgroundColor: [
                        'rgba(255, 99, 132, 0.2)',
                        'rgba(54, 162, 235, 0.2)',
                        'rgba(255, 206, 86, 0.2)',
                        'rgba(75, 192, 192, 0.2)',
                        'rgba(153, 102, 255, 0.2)',
                        'rgba(255, 159, 64, 0.2)'
                    ],
                    borderColor: [
                        'rgba(255, 99, 132, 1)',
                        'rgba(54, 162, 235, 1)',
                        'rgba(255, 206, 86, 1)',
                        'rgba(75, 192, 192, 1)',
                        'rgba(153, 102, 255, 1)',
                        'rgba(255, 159, 64, 1)'
                    ],
                    borderWidth: 2
                }]
            },
            options: {
                scale: {
                    angleLines: {
                        display: false
                    },
                    ticks: {
                        suggestedMin: 0,
                        suggestedMax: 10
                    }
                }
            }
        });
        }
        });

    </script>
@endsection
@endsection


