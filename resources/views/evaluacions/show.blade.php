@extends('layouts.app')

@section('content')

@section('css')
    @include('layouts.datatables_css')
@endsection

    <section class="content-header">
        <h1 style="color: aliceblue">
            Evaluación de desempeño
        </h1>
    </section>
    <div class="content">
        <div class="box box-danger">
            <div class="box-body">
                <div class="row" style="padding-left: 20px">
                    @include('evaluacions.show_fields')
                    <a href="javascript:history.back()" class="btn btn-default">Atrás</a>
                </div>
            </div>
        </div>
    </div>



@section('scripts')
    @include('layouts.datatables_js')
@endsection
@endsection


