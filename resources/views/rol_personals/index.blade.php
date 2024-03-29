@extends('layouts.app')

@section('content')
    <section class="content-header">
        <h1 style="color: aliceblue" class="pull-left">Roles del Personals</h1>
        <h1 class="pull-right">
           <a class="btn btn-danger pull-right" style="margin-top: -10px;margin-bottom: 5px" href="{{ route('rolPersonals.create') }}">Add New</a>
        </h1>
    </section>
    <div class="content">
        <div class="clearfix"></div>

        @include('flash::message')

        <div class="clearfix"></div>
        <div class="box box-danger">
            <div class="box-body">
                    @include('rol_personals.table')
            </div>
        </div>
        <div class="text-center">

        </div>
    </div>
@endsection

