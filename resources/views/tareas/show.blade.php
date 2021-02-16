@extends('layouts.app')

@section('content')
    <div class="content">
        <div class="clearfix"></div>

        @include('flash::message')
        <div class="box box-danger">
            <div class="box-body">

                <section class="content-header">
                    <h1 class="pull-left">Tarea</h1>
                </section>
                <br><hr>
                <div class="row" style="padding-left: 20px">
                    @section('css')
                        @include('layouts.datatables_css')
                    @endsection

                    <div class="col-md-12 mb-12">

                        {{ $tarea->Nombre_tarea }}

                        <br><br>
                        <td><button class="btn" data-toggle="modal" data-target="#Datos" type="button">Datos</button></td>

                    </div>

                </div>
                <br>
            </div>
            <div class=" box box-danger">
                <div class="box-body">
                    <ul class="nav nav-tabs" id="myTab" role="tablist">
                        <li class="nav-item active">
                            <a class="nav-link" id="contact-tab" data-toggle="tab" href="#entregas" role="tab" aria-controls="entregas" aria-selected="false">Entregas</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" id="profile-tab" data-toggle="tab" href="#recursos" role="tab" aria-controls="recursos" aria-selected="true">Recursos</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" id="profile-tab" data-toggle="tab" href="#personal" role="tab" aria-controls="personal" aria-selected="false">Personal</a>
                        </li>
                    </ul>

                    <div class="tab-content" id="myTabContent">
                        <div class="tab-pane fade" id="recursos" role="tabpanel" aria-labelledby="recursos-tab">
                            <section class="content-header">
                                <br>
                                <h1 class="pull-left">Recursos</h1>
                                <br>
                            </section>
                            <br> <br>

                            <div class="col-md-12 mb-12">

                                {!! Form::label('Predecesoras', 'Archivos de tareas predecesoras:') !!} <br>
                                @if ($tarea->entregas_predecesoras())
                                    @foreach (($tarea->entregas_predecesoras()) as $entrega)
                                        <a href="{{ route('entregas.show', $entrega->id) }}">{{ $entrega->Archivo }}</a> <br>
                                    @endforeach
                                @else
                                    <p style="padding-left: 1%; padding-top: 1%">* No hay archivos</p>
                                @endif
                                <br>
                                <a class="btn btn-danger"  href="/proyectos/{{$tarea->proyecto->id}}/informe">Informe de proyecto</a> <br>

                            </div>
                        </div>
                        <div class="tab-pane fade" id="personal" role="tabpanel" aria-labelledby="personal-tab">
                            <section class="content-header">
                                <br>
                                <h1 class="pull-left">Personal asignado</h1>
                                <br>
                            </section>
                            <br> <br>

                            {{--
                                @foreach ($tarea->idResponsables() as $item)
                                    {{ $item }}
                                @endforeach

                                {{ $tarea->menor_carga_de_trabajo_horas($tarea->idResponsables()) }}
                            --}}

                            @if (sizeof($asignaciones))
                                <div class="form-group col-sm-12">
                                    @foreach ($asignaciones as $asignacion)
                                    <b>{{$asignacion->Personal->NombrePersonal." ".$asignacion->Personal->ApellidoPersonal}}:</b> {{ $asignacion->Responsabilidad }} <br>
                                    @endforeach
                                    <br>

                                    @if (Auth::user()->Rol_id < 3)
                                        <a class="btn btn-danger" href="/tareas/{{$tarea->id}}/asignacionPersonalTareas/create">Editar</a>
                                    @endif
                                </div>
                            @else
                                <div class="form-group col-sm-12">
                                    <p>No se han asignado personal a la tarea</p><br>
                                    @if (Auth::user()->Rol_id < 3)
                                        <a class="btn btn-danger" href="/tareas/{{$tarea->id}}/asignacionPersonalTareas/create">Asignar</a>
                                    @endif
                                </div>
                            @endif
                        </div>
                        <div class="tab-pane active" id="entregas" role="tabpanel" aria-labelledby="entregas-tab">
                            <section class="content-header">
                                <br><h1>
                                    Datos de entrega
                                </h1><br>
                            </section>
                            <div class="box-body">
                                <table class="table table-striped table-bordered">
                                    <tbody>
                                        <tr>
                                            <td>Fecha limite de entrega</td>
                                            <td>A las {{ $tarea->Fecha_limite->format(' H:m ') }} hs del dia {{ $tarea->getFechaLimite() }}</td>
                                        </tr>
                                        <tr>
                                            <td>Fecha de entrega</td>
                                            <td>{{ $tarea->getFechaFin() }}</td>
                                        </tr>
                                        <tr>
                                            <td>Archivos</td>
                                            <td>
                                            @foreach ($entregas as $entrega)
                                            <a href="{{ route('entregas.show', $entrega->id) }}">{{ $entrega->Archivo }}</a> <br>
                                            @endforeach
                                            </td>
                                        </tr>
                                        <tr>
                                            <td>Comentarios</td>
                                            <td>
                                                @foreach ($comentarios as $comentario)
                                                <b>{{ $comentario->personal->NombrePersonal }} {{ $comentario->personal->ApellidoPersonal }}</b><br>
                                                {{ $comentario->Contenido }}<br>
                                                <p style="color: rgb(185, 185, 185)">at {{ $comentario->created_at }}</p>
                                                @endforeach
                                                <a href="" class="" data-toggle="modal" data-target="#CrearComentario" type="button">Comentar</a>
                                            </td>
                                        </tr>
                                    </tbody>
                                </table>

                                <div class="text-center">
                                    <br>
                                    {{--   <a href="/tareas/{{$tarea->id}}/autoAsignar" class="btn btn-danger ">Asignar</a>--}}
                                    @if ($tarea->Estado_tarea_id == 3)
                                        <a class="btn btn-danger" href="/tareas/{{$tarea->id}}/entregas/create">Añadir entrega</a>
                                    @endif
                                    @if ($tarea->Estado_tarea_id == 4)
                                        <a class="btn btn-danger" href="/tareas/{{$tarea->id}}/entregas/create">Editar entrega</a>
                                    @endif
                                    @if (($tarea->Estado_tarea_id == 4) and (Auth::user()->Rol_id < 3))
                                        <a href="/tareas/{{$tarea->id}}/aprobar" class="btn btn-danger">Aprobar</a>
                                        <a href="/tareas/{{$tarea->id}}/desaprobar" class="btn btn-danger ">Desaprobar</a>
                                    @endif

                                </div>
                            </div>
                        </div>
                    </div>
                    <div>
                        @if (Auth::user()->Rol_id < 3)
                            <a href="{{ route('proyectos.show', $tarea->Proyecto_id) }}" class="btn btn-danger pull-right" >Volver</a>
                        @endif
                    </div>
                </div>
            </div>
        </div>
    </div>

    {{-- Inicio de modal de "Mostrar datos tarea" --}}
        <div id="Datos" class="modal" tabindex="-1" role="dialog">
            <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header" style="background-color: rgb(223, 43, 61)">
                <h5 class="modal-title"> <b style="color: white"> Datos de tarea </b>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button></h5>
                </div>
                <div class="modal-body">
                    <div style="padding-left: 2%; padding-top: 2%">
                        @include('tareas.show_fields')
                    </div>
                </div>
                <div class="modal-footer">
                <button type="button" class="btn btn-danger" data-dismiss="modal">Cerrar</button>
                </div>
            </div>
            </div>
        </div>
    {{-- Fin de modal de "Mostrar datos tarea" --}}

    {{-- Inicio de modal de "Comentar" --}}
        <div id="CrearComentario" class="modal" tabindex="-1" role="dialog">
            <div class="modal-dialog" role="document">
                <div class="modal-content">
                    <div class="modal-header" style="background-color: rgb(223, 43, 61)">
                        <h5 class="modal-title"> <b style="color: white">Nuevo comentario </b>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                        </button></h5>
                    </div>
                    <div class="modal-body">
                        {!! Form::open(['url' => "tareas/$tarea->id/comentarios"]) !!}

                        <!-- Contenido Field -->
                            {!! Form::label('Contenido', 'Comentario:') !!}
                            {!! Form::textarea('Contenido', null, ['class' => 'form-control']) !!} <br>

                        <!-- Submit Field -->
                            {!! Form::submit('Guardar', ['class' => 'btn btn-danger']) !!}
                            <button type="button" class="btn btn-default" data-dismiss="modal" aria-label="Close">Cerrar</button>
                        {!! Form::close() !!}
                    </div>
                    <div class="modal-footer">
                    </div>
                </div>
            </div>
        </div>
    {{-- Fin de modal de "Comentar" --}}

@endsection


@section('scripts')
    @include('layouts.datatables_js')
@endsection
