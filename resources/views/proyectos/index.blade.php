@extends('layouts.app')

@section('content')
    <section class="content-header">
        <h1 class="pull-left" style="color: aliceblue">Proyectos</h1>
        <h1 class="pull-right">
           <a class="btn btn-danger pull-right" style="margin-top: -10px;margin-bottom: 5px" href="{{ route('proyectos.create') }}">Nuevo</a>
        </h1>
    </section>
    <div class="content">
        <div class="clearfix"></div>

        @include('flash::message')

        <div class="clearfix"></div>

        <div>
            <div class="box box-danger">
                <div class="box-body">
                <h1 style="font-size: 30px">Filtrar proyectos</h1>

                    <br>
                    {!! Form::open(['route' => 'proyectos.index', 'method' => 'GET', 'form-inline pull-right']) !!}
                        <div class="form-group col-md-3">
                            <input type="text" name="codigo" class="form-control" placeholder="Código">
                        </div>

                        <div class="form-group col-md-3">
                            <input type="text" name="tipo" class="form-control" placeholder="Tipo">
                        </div>

                        <div class="form-group col-md-3">
                            <input type="text" name="comitente" class="form-control" placeholder="Comitente">
                        </div>

                        <div class="form-group col-md-3">
                            <input type="text" name="provincia" class="form-control" placeholder="Provincia">
                        </div>

                        <div class="form-group col-md-3">
                            <input type="text" name="localidad" class="form-control" placeholder="Localidad">
                        </div>

                        <div class="form-group col-md-3">
                            <input type="text" name="calle" class="form-control" placeholder="Calle">
                        </div>

                        <div class="form-group col-md-3 pull-right">
                            <button type="submit" class="btn btn-danger pull-right">
                                <span class="glyphicon glyphicon-search"></span>
                            </button>
                        </div>
                    {!! Form::close() !!}

            </div>
        </div>

        <div class="box box-danger">
            <div class="box-body">
                @section('css')
                    @include('layouts.datatables_css')
                @endsection
                    <table id="Proyectos" class="table table-striped table-bordered">
                        <thead>
                            <tr>
                                <th>Codigo</th>
                                <th>Tipo de proyecto</th>
                                <th>Comitente</th>
                                <th>Dirección</th>
                                <th>Acciones</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($proyectos as $proyecto)
                            <tr>
                                <td>{{ $proyecto->id }}</td>
                                <td>{{ $proyecto->tipo_proyecto->Nombre }}</td>
                                <td>{{ $proyecto->comitente->ApellidoComitente }} {{ $proyecto->comitente->NombreComitente }}</td>
                                <td>{{ $proyecto->direccion->Calle}} {{ $proyecto->direccion->Altura}}, {{ $proyecto->direccion->localidad->localidad}}, {{ $proyecto->direccion->provincia->provincia}}</td>
                                <td>{!! Form::open(['route' => ['proyectos.destroy', $proyecto->id], 'method' => 'delete']) !!}
                                    <div class='btn-group'>
                                        <a href="{{ route('proyectos.show', $proyecto->id) }}" class='btn btn-default btn-xs'>
                                            <i class="glyphicon glyphicon-eye-open"></i>
                                        </a>
                                        <a href="{{ route('proyectos.edit', $proyecto->id) }}" class='btn btn-default btn-xs'>
                                            <i class="glyphicon glyphicon-edit"></i>
                                        </a>
                                        {!! Form::button('<i class="glyphicon glyphicon-trash"></i>', [
                                            'type' => 'submit',
                                            'class' => 'btn btn-danger btn-xs',
                                            'onclick' => "return confirm('Esta seguro que desea eliminar esta tarea?')"
                                        ]) !!}
                                    </div>
                                    {!! Form::close() !!}
                                </td>
                            </tr>
                            @endforeach
                        </tbody>
                    </table>
                    @section('scripts')
                        @include('layouts.datatables_js')
                    @endsection
            </div>
        </div>
        <div class="text-center">

        </div>
    </div>
@endsection

