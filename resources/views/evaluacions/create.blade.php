@extends('layouts.app')

@section('content')

    <div class="content">
        @include('adminlte-templates::common.errors')
        <div class="box box-danger">
            <div class="box-body">
                <section class="content-header">
                    <h1 style="">
                        Evaluacion
                    </h1>
                </section>
                <br>
                <div class="row">
                    {!! Form::open(['url' => "personals/$personal->id/evaluacions"]) !!}

                        @include('evaluacions.fields')

                    {!! Form::close() !!}
                </div>
            </div>
        </div>
    </div>
@endsection
