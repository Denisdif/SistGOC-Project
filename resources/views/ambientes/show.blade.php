@extends('layouts.app')

@section('content')
    <section class="content-header">
        <h1>
            Ambiente
        </h1>
    </section>
    <div class="content">
        <div class="box box-primary">
            <div class="box-body">
                <div class="row" style="padding-left: 20px">
                    @include('ambientes.show_fields')
                    <a href="{{ route('ambientes.index') }}" class="btn btn-default">Back</a>
                </div>
            </div>
        </div>
    </div>
@endsection
