@extends('layouts.app')

@section('content')
    <section class="content-header">
        <h1 style="color: aliceblue">
            Ambiente
        </h1>
    </section>
    <div class="content">
        <div class="box box-danger">
            <div class="box-body">
                <div class="row" style="padding-left: 20px">
                    @include('ambientes.show_fields')
                    <a href="javascript:history.back()" class="btn btn-default">Atrás</a>
                </div>
            </div>
        </div>
    </div>
@endsection
