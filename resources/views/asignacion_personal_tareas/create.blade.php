@extends('layouts.app')

@section('css')
    @include('layouts.datatables_css')
@endsection

@section('scripts')
    @include('layouts.datatables_js')
@endsection

@section('content')
    <section class="content-header">
        <h1 style="color: aliceblue">
            Asignar personal
        </h1>
    </section>



    {{-- Inicio de DataTable de Personal del proyecto --}}

    <div class="content-header">
        @include('flash::message')
        @include('adminlte-templates::common.errors')
        <div class="box box-danger">
            <div class="box-body">
                <table class="table datatables table-striped table-bordered">
                    <thead>
                        <tr>
                            <th>Nombre completo</th>
                            <th>Responsabilidad</th>
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
                <button class="btn btn-danger" data-toggle="modal" data-target="#CrearAsignacion" type="button">Nueva asignación</button>
                </div>
            </div>
        </div>
    </div>

    {{-- Fin de DataTable de Personal del proyecto --}}

    {{-- Inicio de DataTable de Personal del proyecto --}}

    <section class="content-header">
        <h1 style="color: aliceblue">
            Carga de trabajo del personal
        </h1>
    </section>

    <div class="content-header">
        <div class="box box-danger">
            <div class="box-body">
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
                            <td><button class="btn" data-toggle="modal" data-target="#PruebaModal{{$Personal->id}}" type="button">Tareas</button></td>
                        </tr>
                        @endif
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>

    {{-- Fin de DataTable de Personal del proyecto --}}



    <div id="CrearAsignacion" class="modal" tabindex="-1" role="dialog">
        <div class="modal-dialog" role="document">
          <div class="modal-content">
            <div class="modal-header">
              <h5 class="modal-title">Modal title
              <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">&times;</span>
              </button></h5>
            </div>
            <div class="modal-body">
                <div class="row">
                    {!! Form::open(['url' => "tareas/$tarea->id/asignacionPersonalTareas"]) !!}

                        @include('asignacion_personal_tareas.fields')

                    {!! Form::close() !!}
                </div>
            </div>
          </div>
        </div>
      </div>

    @foreach ($personal as $Personal)
        <div id="PruebaModal{{$Personal->id}}" class="modal" tabindex="-1" role="dialog">
            <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-body" style="background-color: rgb(250, 250, 250)">
                    <section class="content-header">
                        <h3 style= "color: rgb(0, 0, 0)">Lista de tareas
                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                            </button></h3>
                    </section>
                    <div class="content" style="background-color: rgb(245, 245, 245)">
                        <div class="clearfix"></div>

                        @include('flash::message')

                        <div class="clearfix"></div>
                        <div class="box box-danger">
                            <div class="box-body">
                                @section('css')
                                @include('layouts.datatables_css')
                            @endsection
                                <table  id="Personal" class="datatables table  table-bordered">
                                    <thead>
                                        <tr>
                                            <th>Nombre</th>
                                            <th>Responsabilidad</th>
                                            <th>Acciones</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @foreach (($Personal->tareasEnDesarrollo()) as $asignacion)
                                                <tr>
                                                <td>{{ $asignacion->tarea->Nombre_tarea }}</td>
                                                <td>{{ $asignacion->Responsabilidad }}</td>
                                                <td>
                                                    <a href="{{ route('tareas.show', $asignacion->Tarea_id) }}" class='btn btn-default btn-xs'>
                                                        <i class="glyphicon glyphicon-eye-open"></i>
                                                    </a>
                                                </td>
                                                </tr>
                                        @endforeach
                                    </tbody>
                                </table>
                                @section('scripts')
                                    @include('layouts.datatables_js')
                                @endsection
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            </div>
        </div>
    @endforeach

@endsection
