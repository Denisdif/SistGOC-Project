@extends('layouts.app')
@section('title')
    Users
@endsection
@section('content')
    <section class="content-header">
        <h1 style="color: aliceblue">
            Usuarios
        </h1>
    </section>
    <div class="content">
        @include('adminlte-templates::common.errors')
        <div class="box box-danger">
            <div class="box-body">
                <div class="row">
                    {!! Form::open(['url' => "personals/$personal->id/users",'files' => true]) !!}

                        @include('users.fields')

                    {!! Form::close() !!}
                </div>
            </div>
        </div>
    </div>
@endsection
