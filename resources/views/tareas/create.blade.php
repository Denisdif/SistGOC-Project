@extends('layouts.app')

@section('content')

    <div class="content">
        @include('adminlte-templates::common.errors')
        <div class="box box-danger">
            <div class="box-body">
                <section class="content-header">
                    <h1>Nueva tarea</h1>
                </section>
                <hr>
                <div class="content">
                    <div class="row">
                        {!! Form::open(['url' => "proyectos/$proyecto->id/tareas"]) !!}

                            @include('tareas.fields')

                        {!! Form::close() !!}
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
