@extends('layouts.app')

@section('content')
   <div class="content">
       @include('adminlte-templates::common.errors')
       <div class="box box-danger">
           <div class="box-body">
               <div class="row">
                   {!! Form::model($proyecto, ['route' => ['proyectos.update', $proyecto->id], 'method' => 'put']) !!}

                        @include('proyectos.fields')

                        <!-- Submit Field -->
                        <div class="form-group col-sm-12">
                            <hr>
                            {!! Form::submit('Crear', ['class' => 'btn btn-danger']) !!}
                            <a href="javascript:history.back()" class="btn btn-default">Cancelar</a>
                        </div>

                   {!! Form::close() !!}
               </div>
           </div>
       </div>
   </div>
@endsection
