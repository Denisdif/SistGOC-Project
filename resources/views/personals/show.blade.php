@extends('layouts.app')

@section('content')
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
@endsection
