@extends('layouts.app')

@section('css')
    @include('layouts.datatables_css')
@endsection

@section('content')

    @include('flash::message')

    <div class="content">
        <div class="box box-danger">
            <div class="box-body">

                <section class="content-header">
                    <h1 class="pull-left">Estadísticas</h1>
                    <button class="btn btn-danger pull-right" data-toggle="modal" data-target="#Filtrar" type="button">Filtrar</button>
                </section>
                <br><hr>

                <section class="content-header">
                    Proyectos en los últimos {{ $cant_meses }} meses desde el {{ $actual->formatLocalized(' %d de %B de %Y') }}
                    <br><br><br>
                </section>

                <div class="row">
                    <div class=" col-sm-10 col-sm-offset-1" >
                        <div class="box box-danger" >
                            <div class="box-body">
                                <canvas id="proyectos_mes" width="40" height="15"></canvas>
                            </div>
                        </div>
                    </div>
                </div>

                <hr>

                <section class="content-header" >
                    Tipos de proyectos de los últimos {{ $cant_meses }} meses desde el {{ $actual->formatLocalized(' %d de %B de %Y') }}
                    <br><br><br>
                </section>

                <div class="row">
                    <div class=" col-sm-10 col-sm-offset-1" >
                        <div class="box box-danger" >
                            <div class="box-body">
                                <canvas id="tipos_proyectos" width="40" height="15"></canvas>
                            </div>
                        </div>
                    </div>
                </div>

            </div>
        </div>
    </div>

    {{-- Modal Filtros --}}

    <div id="Filtrar" class="modal" tabindex="-1" role="dialog">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header" style="background-color: rgb(223, 43, 61)">
                    <h5 class="modal-title"> <b style="color: white"> Modificar filtros </b>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button></h5>
                </div>
                <div class="modal-body">
                    <div class="row">
                        {!! Form::open(['route' => 'proyectos.estadisticas', 'method' => 'GET', 'form-inline pull-right']) !!}
                            <div class="form-group col-md-6">
                                <input type="date" name="Fecha" value="{{ $fecha_act }}" class="form-control" placeholder="Fecha">
                            </div>
                            <div class="form-group col-md-6">
                                <input type="number" name="Meses" value="{{ $cant_meses }}" class="form-control" placeholder="Meses">
                            </div>
                    </div>
                    <div class="modal-footer">
                        <button type="submit" class="btn btn-danger">
                            Filtrar
                        </button>
                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Cerrar</button>
                        {!! Form::close() !!}
                    </div>
                </div>
            </div>
        </div>
    </div>


@endsection

@section('scripts')

    @include('layouts.datatables_js')

    <script>
        var etiquetas=[];
        var valor=[];
        $(document).ready(function() {

        var etiquetas = <?php echo json_encode($mes) ?> ;
        var valor = <?php echo json_encode($proyectos_x_mes) ?> ;

        generarGrafica();
        function generarGrafica(){
            var ctx = document.getElementById('proyectos_mes').getContext('2d');
        var myChart = new Chart(ctx, {
            type: 'line',
            data: {
                labels: etiquetas,
                datasets: [{
                    label: 'Cantidad de proyectos',
                    data: valor,
                    backgroundColor: [
                        'rgba(223, 43, 61, 0.25)',
                        'rgba(54, 162, 235, 0.2)',
                        'rgba(255, 206, 86, 0.2)',
                        'rgba(75, 192, 192, 0.2)',
                        'rgba(153, 102, 255, 0.2)',
                        'rgba(255, 159, 64, 0.2)'
                    ],
                    borderColor: [
                        'rgba(223, 43, 61, 1)'
                    ],
                    borderWidth: 2
                }]
            },

        });
        }
    });

    </script>

    <script>
            var etiquetas=[];
            var valor=[];
            $(document).ready(function() {

            var etiquetas = <?php echo json_encode($etiquetas_tipos) ?> ;
            var valor = <?php echo json_encode($cantidad_tipos) ?> ;

            generarGrafica();
            function generarGrafica(){
                var ctx = document.getElementById('tipos_proyectos').getContext('2d');
            var myChart = new Chart(ctx, {
                type: 'bar',
                data: {
                    labels: etiquetas,
                    datasets: [{
                        label: 'Cantidad de proyectos del tipo',
                        data: valor,
                        backgroundColor: [
                            'rgba(223, 43, 61, 0.25)',
                            'rgba(223, 43, 61, 0.25)',
                            'rgba(223, 43, 61, 0.25)',
                            'rgba(223, 43, 61, 0.25)',
                            'rgba(223, 43, 61, 0.25)',
                            'rgba(223, 43, 61, 0.25)',
                            'rgba(223, 43, 61, 0.25)',
                            'rgba(223, 43, 61, 0.25)',
                            'rgba(223, 43, 61, 0.25)',
                            'rgba(223, 43, 61, 0.25)',
                            'rgba(223, 43, 61, 0.25)',
                            'rgba(223, 43, 61, 0.25)',
                            'rgba(223, 43, 61, 0.25)',
                            'rgba(223, 43, 61, 0.25)',
                            'rgba(223, 43, 61, 0.25)',
                            'rgba(223, 43, 61, 0.25)',
                            'rgba(223, 43, 61, 0.25)',
                            'rgba(223, 43, 61, 0.25)',
                            'rgba(223, 43, 61, 0.25)',
                            'rgba(223, 43, 61, 0.25)',
                        ],
                        borderColor: [
                            'rgba(223, 43, 61, 1)',
                            'rgba(223, 43, 61, 1)',
                            'rgba(223, 43, 61, 1)',
                            'rgba(223, 43, 61, 1)',
                            'rgba(223, 43, 61, 1)',
                            'rgba(223, 43, 61, 1)',
                            'rgba(223, 43, 61, 1)',
                            'rgba(223, 43, 61, 1)',
                            'rgba(223, 43, 61, 1)',
                            'rgba(223, 43, 61, 1)',
                            'rgba(223, 43, 61, 1)',
                            'rgba(223, 43, 61, 1)',
                            'rgba(223, 43, 61, 1)',
                            'rgba(223, 43, 61, 1)',
                            'rgba(223, 43, 61, 1)',
                            'rgba(223, 43, 61, 1)',
                            'rgba(223, 43, 61, 1)',
                            'rgba(223, 43, 61, 1)',
                        ],
                        borderWidth: 2
                    }]
                },
                options: {
                    scales: {
                        yAxes: [{
                            ticks: {
                                suggestedMin: 0
                            }
                        }]
                    }
                },
            });
            }
        });

    </script>
@endsection


