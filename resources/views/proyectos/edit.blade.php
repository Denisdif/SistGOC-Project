@extends('layouts.app')

@section('content')
   <div class="content">
       @include('adminlte-templates::common.errors')
       <div class="box box-danger">
           <div class="box-body">
               <div class="row">
                   {!! Form::model($proyecto, ['route' => ['proyectos.update', $proyecto->id], 'method' => 'put']) !!}

                        @include('proyectos.fields')

                   {!! Form::close() !!}
               </div>
           </div>
       </div>
   </div>
@endsection
