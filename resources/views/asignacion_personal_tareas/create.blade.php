@extends('layouts.app')

@section('content')
    <section class="content-header">
        <h1 style="color: aliceblue">
            Asignacion Personal Tarea
        </h1>
    </section>

    <div class="content">
        @include('flash::message')
        @include('adminlte-templates::common.errors')
        <div class="box box-danger">
            <div class="box-body">
                <div class="row">
                    {!! Form::open(['url' => "tareas/$tarea->id/asignacionPersonalTareas"]) !!}

                        @include('asignacion_personal_tareas.fields')

                    {!! Form::close() !!}
                </div>
            </div>
        </div>
    </div>
@endsection
