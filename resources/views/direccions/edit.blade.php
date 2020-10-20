@extends('layouts.app')

@section('content')
    <section class="content-header">
        <h1>
            Direccion
        </h1>
   </section>
   <div class="content">
       @include('adminlte-templates::common.errors')
       <div class="box box-primary">
           <div class="box-body">
               <div class="row">
                   {!! Form::model($direccion, ['route' => ['direccions.update', $direccion->id], 'method' => 'patch']) !!}

                        @include('direccions.fields')

                   {!! Form::close() !!}
               </div>
           </div>
       </div>
   </div>
@endsection