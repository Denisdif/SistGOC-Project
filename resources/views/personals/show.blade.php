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
                    <a class="btn btn-danger"  href="{{ route('personals.users.create', $personal->id) }}">Crear usuario</a>
                    @foreach ($usuarios as $item)
                                <h2>Datos de usuario</h2><br>
                                <!-- Name Field -->
                                    {!! Form::label('name', 'Name:') !!}
                                    {{ $item->name }} <br>

                                <!-- Email Field -->
                                    {!! Form::label('email', 'Email:') !!}
                                    {{ $item->email }} <br>

                                <!-- Rol Field -->
                                    {!! Form::label('rol', 'Rol:') !!}
                                    {{ $item->rol->NombreRol }} <br><br>
                    @endforeach
                    <a href="{{ route('personals.index') }}" class="btn btn-default">Volver</a>
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
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($evaluaciones as $evaluacion)
                        <tr>
                            <td>{{ $evaluacion->Fecha_inicio }}</td>
                            <td>{{ $evaluacion->Fecha_fin }}</td>
                            <td>{{ $evaluacion->evaluador->NombrePersonal }}</td>
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
