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
                </div>


            </div>
            <div>
                <div class="box box-danger">
                    <div class="box-body">
            <ul class="nav nav-tabs" id="myTab" role="tablist">
                <li class="nav-item">
                  <a class="nav-link active" id="home-tab" data-toggle="tab" href="#home" role="tab" aria-controls="home" aria-selected="true">Rendimiento</a>
                </li>
                <li class="nav-item">
                  <a class="nav-link" id="profile-tab" data-toggle="tab" href="#profile" role="tab" aria-controls="profile" aria-selected="false">Evaluaciones</a>
                </li>
                <li class="nav-item">
                  <a class="nav-link" id="contact-tab" data-toggle="tab" href="#contact" role="tab" aria-controls="contact" aria-selected="false">Usuario</a>
                </li>
              </ul>
              <div class="tab-content" id="myTabContent">
                <div class="tab-pane fade content" id="home" role="tabpanel" aria-labelledby="home-tab">
                    <div class="content">
                        <h2>Por definir</h2><br>
                    </div>
                </div>
                <div class="tab-pane fade content" id="profile" role="tabpanel" aria-labelledby="profile-tab">
                    <br>

                    {{-- Inicio de DataTable de ambientes del proyecto --}}


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
                <div class="tab-pane fade content" id="contact" role="tabpanel" aria-labelledby="contact-tab">
                    <h2>Datos de usuario</h2><br>
                            <!-- Name Field -->
                                {!! Form::label('name', 'Nombre:') !!}
                                {{ $usuarios->name }} <br>

                            <!-- Email Field -->
                                {!! Form::label('email', 'Email:') !!}
                                {{ $usuarios->email }} <br>

                            <!-- Rol Field -->
                                {!! Form::label('rol', 'Rol:') !!}
                                {{ $usuarios->rol->NombreRol }} <br><br>
                </div>
              </div>

            </div>
        </div>
    </div>
        </div>
    </div>


    @section('scripts')
        @include('layouts.datatables_js')
    @endsection
@endsection
