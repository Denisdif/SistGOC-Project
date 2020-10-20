@extends('layouts.app')

@section('content')
    <section class="content-header">
        <h1>
            Sexo
        </h1>
   </section>
   <div class="content">
       @include('adminlte-templates::common.errors')
       <div class="box box-primary">
           <div class="box-body">
               <div class="row">
                   {!! Form::model($sexo, ['route' => ['sexos.update', $sexo->id], 'method' => 'patch']) !!}

                        @include('sexos.fields')

                   {!! Form::close() !!}
               </div>
           </div>
       </div>
   </div>
@endsection