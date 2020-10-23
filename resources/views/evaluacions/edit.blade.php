@extends('layouts.app')

@section('content')
    <section class="content-header">
        <h1>
            Evaluacion
        </h1>
   </section>
   <div class="content">
       @include('adminlte-templates::common.errors')
       <div class="box box-primary">
           <div class="box-body">
               <div class="row">
                   {!! Form::model($evaluacion, ['route' => ['evaluacions.update', $evaluacion->id], 'method' => 'patch']) !!}

                        @include('evaluacions.fields')

                   {!! Form::close() !!}
               </div>
           </div>
       </div>
   </div>
@endsection