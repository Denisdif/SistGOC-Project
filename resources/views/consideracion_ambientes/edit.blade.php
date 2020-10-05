@extends('layouts.app')

@section('content')
    <section class="content-header">
        <h1>
            Consideracion Ambiente
        </h1>
   </section>
   <div class="content">
       @include('adminlte-templates::common.errors')
       <div class="box box-primary">
           <div class="box-body">
               <div class="row">
                   {!! Form::model($consideracionAmbiente, ['route' => ['consideracionAmbientes.update', $consideracionAmbiente->id], 'method' => 'patch']) !!}

                        @include('consideracion_ambientes.fields')

                   {!! Form::close() !!}
               </div>
           </div>
       </div>
   </div>
@endsection