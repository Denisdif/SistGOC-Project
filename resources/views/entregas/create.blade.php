@extends('layouts.app')

@section('content')

    <div class="content">
        @include('adminlte-templates::common.errors')
        <div class="box box-danger">
            <div class="box-body">
                <section class="content-header">
                    <h1>
                        Entrega
                        <hr>
                    </h1>

                </section>
                <div class="content">
                    <div class="row">
                        {!! Form::open(['url' => "tareas/$tarea->id/entregas", 'files' => true, 'enctype' => "multipart/form-data"]) !!}

                            @include('entregas.fields')

                        {!! Form::close() !!}
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
