@extends('layouts.app')

@section('content')
    <section class="content-header" style="color: aliceblue">
        <h1>
            Proyecto Ambiente
        </h1>
    </section>
    <div class="content">
        <div class="box box-danger">
            <div class="box-body">
                <div class="row" style="padding-left: 20px">
                    @include('proyecto_ambientes.show_fields')
                    <a href="{{ route('proyectoAmbientes.index') }}" class="btn btn-default">Back</a>
                </div>
            </div>
        </div>
    </div>
@endsection
