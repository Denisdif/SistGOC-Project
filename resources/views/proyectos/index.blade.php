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

                    @if (Auth :: user()->Rol_id == 1)
                        soy admin
                    @endif

                    <br>
                    {!! Form::open(['route' => 'proyectos.index', 'method' => 'GET', 'form-inline pull-right']) !!}
                        <div class="form-group col-md-4">
                            <input type="text" name="codigo" class="form-control" placeholder="Nombre">
                        </div>

                        <div class="form-group col-md-4">
                            <input type="text" name="comitente" class="form-control" placeholder="Comitente">
                        </div>

                        <div class="form-group col-md-4">
                            <input type="date" name="fecha" class="form-control" placeholder="Fecha">
                        </div>

                        <div class="form-group col-md-4 pull-right">
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
                                <th>Nro de proyecto</th>
                                <th>Comitente</th>
                                <th>Dirección</th>
                                <th>Fecha limite</th>
                                <th>Acciones</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($proyectos as $proyecto)
                            <tr>
                                <td>{{ $proyecto->id }}</td>
                                <td>{{ $proyecto->comitente->ApellidoComitente }} {{ $proyecto->comitente->NombreComitente }}</td>
                                <td>{{ $proyecto->direccion->Calle}} {{ $proyecto->direccion->Altura}}, {{ $proyecto->direccion->localidad->localidad}}, {{ $proyecto->direccion->provincia->provincia}}</td>
                                <td>{{ $proyecto->get_fecha_fin() }}</td>
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

