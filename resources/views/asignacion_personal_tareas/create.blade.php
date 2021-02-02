@extends('layouts.app')

@section('content')

    @section('css')
        @include('layouts.datatables_css')
    @endsection

    <div class="content-header">
        @include('flash::message')
        @include('adminlte-templates::common.errors')
        <div class="box box-danger">
            <div class="box-body">
                <section class="content-header">
                    <h1>Asignar personal</h1>
                </section>
                <hr>
                <div class="content">
                    {{-- Inicio de DataTable de Personal del proyecto --}}
                        <table class="table datatables table-striped table-bordered">
                            <thead>
                                <tr>
                                    <th>Nombre completo</th>
                                    <th>Rol</th>
                                    <th>Acciones</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($asignaciones as $asignacion)
                                <tr>
                                    <td>{{$asignacion->Personal->NombrePersonal." ".$asignacion->Personal->ApellidoPersonal}}</td>
                                    <td>{{$asignacion->Responsabilidad}}</td>
                                    <td>{!! Form::open(['route' => ['asignacionPersonalTareas.destroy', $asignacion->id], 'method' => 'delete']) !!}
                                        <div class='btn-group'>
                                            <a href="{{ route('asignacionPersonalTareas.show', $asignacion->id) }}" class='btn btn-default btn-xs'>
                                                <i class="glyphicon glyphicon-eye-open"></i>
                                            </a>
                                            <a href="{{ route('asignacionPersonalTareas.edit', $asignacion->id) }}" class='btn btn-default btn-xs'>
                                                <i class="glyphicon glyphicon-edit"></i>
                                            </a>
                                            {!! Form::button('<i class="glyphicon glyphicon-trash"></i>', [
                                                'type' => 'submit',
                                                'class' => 'btn btn-danger btn-xs',
                                                'onclick' => "return confirm('Are you sure?')"
                                            ]) !!}
                                        </div>
                                        {!! Form::close() !!}</td>
                                </tr>
                                @endforeach
                            </tbody>
                        </table>
                        <div class="text-center">
                            <button class="btn btn-danger" data-toggle="modal" data-target="#CrearAsignacion" type="button">
                            Nueva asignación</button>
                        </div>
                    {{-- Fin de DataTable de Personal del proyecto --}}
                </div>
            </div>
        </div>

        <div class="box box-danger">
            <div class="box-body">
                <section class="content-header">
                    <h1>Carga de trabajo del personal</h1>
                </section>
                <hr>
                <div class="content">
                    {{-- Inicio de DataTable de Personal del proyecto --}}
                        <table class="table datatables table-striped table-bordered">
                            <thead>
                                <tr>
                                    <th>Nombre completo</th>
                                    <th>Tareas en dearrollo</th>
                                    <th>Carga de trabajo (hs)</th>
                                    <th>Acciones</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($personal as $Personal)
                                @if ($Personal->get_rol()->id == 3)
                                <tr>
                                    <td>{{ $Personal->NombrePersonal }} {{ $Personal->ApellidoPersonal }}</td>
                                    <td>{{ sizeof($Personal->tareasEnDesarrollo()) }}</td>
                                    <td>{{ $Personal->carga_de_trabajo_horas() }}</td>
                                    <td><button class="btn btn-xs" data-toggle="modal" data-target="#PruebaModal{{$Personal->id}}" type="button">Tareas</button></td>
                                </tr>
                                @endif
                                @endforeach
                            </tbody>
                        </table>
                    {{-- Fin de DataTable de Personal del proyecto --}}
                </div>
            </div>
        </div>
    </div>

    {{-- Inicio de modal de asignación de tarea --}}
        <div id="CrearAsignacion" class="modal" tabindex="-1" role="dialog">
            <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header" style="background-color: rgb(223, 43, 61)">
                    <h5 class="modal-title"> <b style="color: white"> Asignar </b>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button></h5>
                </div>
                <div class="modal-body">
                    <div class="row">
                        {!! Form::open(['url' => "tareas/$tarea->id/asignacionPersonalTareas"]) !!}
                            @include('asignacion_personal_tareas.fields')
                    </div>
                </div>
                <div class="modal-footer">
                    {!! Form::submit('Asignar', ['class' => 'btn btn-danger']) !!}
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Cerrar</button>
                </div>
                {!! Form::close() !!}
            </div>
            </div>
        </div>
    {{-- Fin de modal de asignación de tarea --}}

    {{-- Inicio de modal de tareas de personal --}}
        @foreach ($personal as $Personal)
            <div id="PruebaModal{{$Personal->id}}" class="modal" tabindex="-1" role="dialog">
                <div class="modal-dialog" role="document">
                    <div class="modal-content">
                        <div class="modal-header" style="background-color: rgb(223, 43, 61)">
                            <h5 class="modal-title"> <b style="color: white"> Lista de tareas asignadas </b>
                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                <span aria-hidden="true">&times;</span>
                            </button></h5>
                        </div>
                        <div class="modal-body">
                            <table  id="Personal" class="datatables table  table-bordered">
                                <thead>
                                    <tr>
                                        <th>Nombre</th>
                                        <th>Rol</th>
                                        <th>Proyecto</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach (($Personal->tareasEnDesarrollo()) as $asignacion)
                                            <tr>
                                            <td>{{ $asignacion->tarea->Nombre_tarea }}</td>
                                            <td>{{ $asignacion->Responsabilidad }}</td>
                                            <td>{{ $asignacion->tarea->proyecto->Nombre_proyecto }}</td>
                                            </tr>
                                    @endforeach
                                </tbody>
                            </table>
                        </div>
                        <div class="modal-footer">
                            <button type="button" class="btn btn-danger" data-dismiss="modal">Cerrar</button>
                        </div>
                    </div>
                </div>
            </div>
        @endforeach
    {{-- Fin de modal de tareas de personal --}}

    @section('scripts')
        @include('layouts.datatables_js')
    @endsection

@endsection





