@extends('layouts.app')

@section('content')
    <section class="content-header">
        <h1>
            Tipo Proyecto
        </h1>
   </section>
   <div class="content">
       @include('adminlte-templates::common.errors')
       <div class="box box-primary">
           <div class="box-body">
               <div class="row">
                   {!! Form::model($tipoProyecto, ['route' => ['tipoProyectos.update', $tipoProyecto->id], 'method' => 'patch']) !!}

                        @include('tipo_proyectos.fields')

                   {!! Form::close() !!}
               </div>
           </div>
       </div>
   </div>
@endsection