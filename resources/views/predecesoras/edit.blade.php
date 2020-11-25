@extends('layouts.app')

@section('content')
    <section class="content-header">
        <h1>
            Predecesora
        </h1>
   </section>
   <div class="content">
       @include('adminlte-templates::common.errors')
       <div class="box box-primary">
           <div class="box-body">
               <div class="row">
                   {!! Form::model($predecesora, ['route' => ['predecesoras.update', $predecesora->id], 'method' => 'patch']) !!}

                        @include('predecesoras.fields')

                   {!! Form::close() !!}
               </div>
           </div>
       </div>
   </div>
@endsection