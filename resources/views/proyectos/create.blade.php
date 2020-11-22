@extends('layouts.app')

@section('content')


    <section class="content-header">
        <h1 style="color: aliceblue">
            Proyecto
        </h1>
    </section>
    <div class="content">
        @include('flash::message')
        @include('adminlte-templates::common.errors')
        <div class="box box-danger">
            <div class="box-body">
                <div class="row">
                    {!! Form::open(['route' => 'proyectos.store', 'enctype' => 'multipart/form-data', 'files' => true]) !!}

                        @include('proyectos.fields')

                        <div>
                            <div class="form-group col-sm-12">
                                <hr>
                                <h3>Carga de ambietes</h3>
                            </div>

                            <!-- Ambiente Id Field -->
                            <div class="form-group col-sm-6">
                                {!! Form::label('Ambiente_id', 'Ambiente:') !!}
                                {!! Form::select('Ambiente_id', $ambienteItems, null, ['class' => 'form-control']) !!}
                            </div>

                            <!-- Cantidad Field -->
                            <div class="form-group col-sm-6">
                                {!! Form::label('Cantidad', 'Cantidad:') !!}
                                {!! Form::number('Cantidad', '1', ['class' => 'form-control','id' => 'Cantidades']) !!}
                            </div>


                            <div class="form-group col-sm-12">
                                <a class="addRow btn btn-danger ">Agregar a lista</a>
                            </div>

                            <div class="form-group col-sm-12">
                                <h3>Cola de carga</h3>
                            </div>

                            <div class="col-md-12">
                                <table class="table table-striped table-bordered">
                                    <thead>
                                        <th>Ambiente</th>
                                        <th>Cantidad</th>
                                        <th width="125px">Accion</th>
                                    </thead>

                                    <tbody class="ColaCarga">

                                    </tbody>
                                </table>
                            </div>
                        </div>

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
