@extends('layouts.app')

@section('content')

    @section('css')
        @include('layouts.datatables_css')
    @endsection

    <div class="content">
        <div class="clearfix"></div>

        @include('flash::message')
        <div class="box box-danger">
             <div class="box-body">
                <section class="content-header">
                    <h1>Datos personales</h1>
                </section>
                <hr>
                <div class="row" style="padding-left: 30px">
                    <div class="form-group">

                        {!! Form::label('NombrePersonal', 'Nombre completo:') !!}
                        {{ $personal->ApellidoPersonal }} {{ $personal->NombrePersonal }} <br>

                        {!! Form::label('Legajo', 'Número de legajo:') !!}
                        {{ $personal->id }}

                        <br><br>

                        <button class="btn" data-toggle="modal" data-target="#Datos" type="button">Datos</button>

                        @if (Auth :: user()->Rol_id == 1)

                            @if ($personal->Activo == "No")
                                <a onclick="return confirm('Está seguro que desea dar de alta a este desarrollador?')" href="/personals/{{$personal->id}}/baja" class="btn btn-success" type="button">Dar de alta</a>
                            @else
                                <a onclick="return confirm('Está seguro que desea dar de baja a este desarrollador?')" href="/personals/{{$personal->id}}/baja" class="btn btn-danger" type="button">Dar de baja</a>
                            @endif

                        @endif

                    </div>
                </div>

            </div>
            <div class="">
                <div class="box box-danger">
                    <div class="box-body">
                        <ul class="nav nav-tabs" id="myTab" role="tablist">
                            <li class="nav-item active">
                                <a class="nav-link" id="contact-tab" data-toggle="tab" href="#Usuario" role="tab" aria-controls="Usuario" aria-selected="false">Usuario</a>
                            </li>

                            @if ($personal->get_rol()->id == 3)

                            <li class="nav-item">
                                <a class="nav-link " id="home-tab" data-toggle="tab" href="#Rendimiento" role="tab" aria-controls="Rendimiento" aria-selected="true">Rendimiento</a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link" id="profile-tab" data-toggle="tab" href="#Evaluaciones" role="tab" aria-controls="Evaluaciones" aria-selected="false">Evaluaciones</a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link" id="profile-tab" data-toggle="tab" href="#Asistencias" role="tab" aria-controls="Asistencias" aria-selected="false">Asistencias</a>
                            </li>

                            @endif
                        </ul>
                        <div class="tab-content" id="myTabContent">
                            <div class="tab-pane active" id="Usuario" role="tabpanel" aria-labelledby="Usuario-tab">
                                <br>
                                {{--  <section class="content-header">
                                    <h1>Datos de usuario</h1>
                                </section>  --}}

                                <div class="content">
                                <!-- Name Field -->
                                    {!! Form::label('name', 'Nombre:') !!}
                                    {{ $usuarios->name }} <br>

                                <!-- Email Field -->
                                    {!! Form::label('email', 'Email:') !!}
                                    {{ $usuarios->email }} <br>

                                <!-- Rol Field -->
                                    {!! Form::label('rol', 'Rol:') !!}
                                    {{ $usuarios->rol->NombreRol }} <br> <br>

                                    @if ((Auth::user()->Personal_id == $personal->id) or (Auth::user()->Rol_id == 1) )
                                        <a class="btn btn-danger" href="{{ route('users.edit', $usuarios->id) }}">Editar</a>
                                    @endif
                                </div>
                            </div>

                            @if ($personal->get_rol()->id == 3)

                                <div class="tab-pane fade" id="Rendimiento" role="tabpanel" aria-labelledby="Rendimiento-tab">
                                    <div>
                                        <div>
                                            <br>
                                            <section class="content-header">
                                                <h1>Rendimiento general</h1>
                                                <br>
                                            </section>
                                            <div class="col-sm-6" style="padding-left: 4%">
                                                @foreach ($tipos_tareas as $item)

                                                    @if (sizeof($personal->get_tareas_desarrolladas($item->Nombre_tipo_tarea)))
                                                        <br>
                                                        <b>{{ $item->Nombre_tipo_tarea }}:</b>
                                                        <br><br>
                                                        <div style="padding-left: 2%">
                                                            Cantidad de tareas realizadas: {{ sizeof($personal->get_tareas_desarrolladas($item->Nombre_tipo_tarea)) }} <br>
                                                            Calificación general: {{ round(($personal->get_rendimiento($personal->get_tareas_desarrolladas($item->Nombre_tipo_tarea))),2) }} <br>
                                                        </div>
                                                    @endif
                                                @endforeach
                                            </div>

                                            <div class="col-sm-6" style="width: 40%; height: 40%">
                                                <canvas id="rendimiento" width="40" height="40"></canvas>
                                            </div>
                                        </div>

                                    </div>
                                </div>
                                <div class="tab-pane fade content" id="Evaluaciones" role="tabpanel" aria-labelledby="Evaluaciones-tab">
                                    <br>
                                    {{-- Inicio de DataTable de ambientes del proyecto --}}
                                    <table class="table datatables table-striped table-bordered">
                                        <thead>
                                            <tr>
                                                <th>Desde</th>
                                                <th>Hasta</th>
                                                <th>Evaluador</th>
                                                <th>Acciones</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            @foreach ($evaluaciones as $evaluacion)
                                            <tr>
                                                <td>{{ $evaluacion->Fecha_inicio->formatLocalized(' %d de %B de %Y') }}</td>
                                                <td>{{ $evaluacion->Fecha_fin->formatLocalized(' %d de %B de %Y') }}</td>
                                                <td>{{ $evaluacion->evaluador->NombrePersonal }} {{ $evaluacion->evaluador->ApellidoPersonal }}</td>
                                                <td>{!! Form::open(['route' => ['evaluacions.destroy', $evaluacion->id], 'method' => 'delete']) !!}
                                                    <div class='btn-group'>
                                                        <a href="{{ route('evaluacions.show', $evaluacion->id) }}" class='btn btn-default btn-xs'>
                                                            <i class="glyphicon glyphicon-eye-open"></i>
                                                        </a>
                                                        <a href="{{ route('evaluacions.edit', $evaluacion->id) }}" class='btn btn-default btn-xs'>
                                                            <i class="glyphicon glyphicon-edit"></i>
                                                        </a>
                                                        {!! Form::button('<i class="glyphicon glyphicon-trash"></i>', [
                                                            'type' => 'submit',
                                                            'class' => 'btn btn-danger btn-xs',
                                                            'onclick' => "return confirm('Esta seguro que desea eliminar esta tarea?')"
                                                        ]) !!}
                                                    </div>
                                                    {!! Form::close() !!}</td>
                                            </tr>
                                            @endforeach
                                        </tbody>
                                    </table>

                                    @if (Auth :: user()->Rol_id < 3)
                                        <div class="text-center">
                                            <a class="btn btn-danger" href="/personals/{{$personal->id}}/evaluacions/create">Nueva evaluación</a>
                                        </div>
                                    @endif
                                </div>
                                <div class="tab-pane fade content" id="Asistencias" role="tabpanel" aria-labelledby="Asistencias-tab">
                                    <br>

                                    <table class="table datatables table-striped table-bordered">
                                        <thead>
                                            <tr>
                                                <th>Entrada</th>
                                                <th>Salida</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            @foreach ($personal->User->asistencia as $item)
                                            <tr>
                                                <td>{{ $item->Entrada->format('d/m/Y ( H:m:s )') }}</td>
                                                <td>{{ $item->Salida->format('d/m/Y ( H:m:s )') }}</td>
                                            </tr>
                                            @endforeach
                                        </tbody>
                                    </table>
                                </div>

                            @endif
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    {{-- Inicio de modal de "Mostrar datos personales" --}}
        <div id="Datos" class="modal" tabindex="-1" role="dialog">
            <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header" style="background-color: rgb(223, 43, 61)">
                    <h5 class="modal-title"> <b style="color: white"> Datos personales </b>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button></h5>
                </div>
                <div class="modal-body">
                    <div style="padding-left: 2%; padding-top: 2%">
                        @include('personals.show_fields')
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-danger" data-dismiss="modal">Cerrar</button>
                </div>
            </div>
            </div>
        </div>
    {{-- Fin de modal de "Mostrar datos personales" --}}

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
