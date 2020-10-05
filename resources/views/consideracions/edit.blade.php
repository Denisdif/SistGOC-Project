@extends('layouts.app')

@section('content')
    <section class="content-header">
        <h1>
            Consideracion
        </h1>
   </section>
   <div class="content">
       @include('adminlte-templates::common.errors')
       <div class="box box-primary">
           <div class="box-body">
               <div class="row">
                   {!! Form::model($consideracion, ['route' => ['consideracions.update', $consideracion->id], 'method' => 'patch']) !!}

                        @include('consideracions.fields')

                   {!! Form::close() !!}
               </div>
           </div>
       </div>
   </div>
@endsection