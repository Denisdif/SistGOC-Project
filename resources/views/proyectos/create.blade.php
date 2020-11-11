@extends('layouts.app')

@section('content')
    <section class="content-header">
        <h1 style="color: aliceblue">
            Proyecto
        </h1>
    </section>
    <div class="content">
        @include('adminlte-templates::common.errors')
        <div class="box box-danger">
            <div class="box-body">
                <div class="row">
                    {!! Form::open(['route' => 'proyectos.store', 'enctype' => 'multipart/form-data', 'files' => true]) !!}

                        @include('proyectos.fields')

                    {!! Form::close() !!}
                </div>
            </div>
        </div>
    </div>
@endsection
