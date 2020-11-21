@extends('layouts.app')

@section('content')
    <section class="content-header" style="color: aliceblue">
        <h1>
            Proyecto Ambiente
        </h1>
   </section>
   <div class="content">
       @include('adminlte-templates::common.errors')
       <div class="box box-danger">
           <div class="box-body">
               <div class="row">
                   {!! Form::model($proyectoAmbiente, ['route' => ['proyectoAmbientes.update', $proyectoAmbiente->id], 'method' => 'put']) !!}

                        @include('proyecto_ambientes.fields')

                        <!-- Submit Field -->
                    <div class="form-group col-sm-12">
                        <br>
                        {!! Form::submit('Listo', ['class' => 'btn btn-danger']) !!}
                        <a href="javascript:history.back()" data-dismiss="modal" class="btn btn-default">Cancelar</a>
                    </div>

                   {!! Form::close() !!}
               </div>
           </div>
       </div>
   </div>
@endsection
