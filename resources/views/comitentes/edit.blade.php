@extends('layouts.app')

@section('content')
    <section class="content-header">
        <h1>
            Comitente
        </h1>
   </section>
   <div class="content">
       @include('adminlte-templates::common.errors')
       <div class="box box-primary">
           <div class="box-body">
               <div class="row">
                   {!! Form::model($comitente, ['route' => ['comitentes.update', $comitente->id], 'method' => 'patch']) !!}

                        @include('comitentes.fields')

                   {!! Form::close() !!}
               </div>
           </div>
       </div>
   </div>
@endsection