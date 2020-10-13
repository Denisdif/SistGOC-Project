@extends('layouts.app')

@section('content')
    <section class="content-header">
        <h1 style="color: aliceblue">
            Personal
        </h1>
    </section>
    <div class="content">
        @include('adminlte-templates::common.errors')
        <div class="box box-danger">
            <div class="box-body">
                <div class="row">
                    {!! Form::open(['route' => 'personals.store']) !!}

                        @include('personals.fields')

                    {!! Form::close() !!}
                </div>
            </div>
        </div>
    </div>
@endsection
