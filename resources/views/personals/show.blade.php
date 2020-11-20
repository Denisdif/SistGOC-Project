@extends('layouts.app')

@section('content')

    @section('css')
        @include('layouts.datatables_css')
    @endsection
    <section class="content-header">
        <h1 style="color: aliceblue">
            Personal
        </h1>
    </section>
    <div class="content">
        <div class="box box-danger">
            <div class="box-body">
                <div class="row" style="padding-left: 30px">
                    <h2>Datos personales</h2><br>
                    @include('personals.show_fields')
                    @foreach ($usuarios as $item)
                                <h2>Datos de usuario</h2><br>
                                <!-- Name Field -->
                                    {!! Form::label('name', 'Nombre:') !!}
                                    {{ $item->name }} <br>

                                <!-- Email Field -->
                                    {!! Form::label('email', 'Email:') !!}
                                    {{ $item->email }} <br>

                                <!-- Rol Field -->
                                    {!! Form::label('rol', 'Rol:') !!}
                                    {{ $item->rol->NombreRol }} <br><br>

                                    {{ $personal->menor_carga_de_trabajo_horas() }}
                    @endforeach
                    <a href="javascript:history.back()" class="btn btn-default">Atrás</a>
                </div>
            </div>
        </div>
    </div>

    <section class="content-header">
        <h1 style= "color: aliceblue">
            Evaluaciones
            <a class="btn btn-danger pull-right" style="margin-top: -10px;margin-bottom: 5px" href="/personals/{{$personal->id}}/evaluacions/create">Nueva Evaluación</a>
        </h1>
    </section>

    {{-- Inicio de DataTable de ambientes del proyecto --}}


    <div class="content-header">
        <div class="box box-danger">
            <div class="box-body">
                <table id="Evaluaciones" class="table table-striped table-bordered">
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
                            <td>{{ $evaluacion->Fecha_inicio }}</td>
                            <td>{{ $evaluacion->Fecha_fin }}</td>
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
            </div>
        </div>
    </div>

    {{-- Fin de DataTable de ambientes del proyecto --}}


    @section('scripts')
        @include('layouts.datatables_js')
    @endsection
@endsection
