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
                    <td><button class="btn" data-toggle="modal" data-target="#Filtrar" type="button">Filtrar</button></td>
                    {!! Form::open(['route' => 'PDF.proyectosPDF', 'form-inline pull-right']) !!}

                        <div style="display: none">
                            <div class="form-group col-md-3">
                                <input type="text" name="codigo" value="{{ $codigo }}" class="form-control" placeholder="Código">
                            </div>

                            <div class="form-group col-md-3">
                                <input type="text" name="tipo" value="{{ $tipo }}" class="form-control" placeholder="Tipo">
                            </div>

                            <div class="form-group col-md-3">
                                <input type="text" name="comitente" value="{{ $comitente }}" class="form-control" placeholder="Comitente">
                            </div>

                            <div class="form-group col-md-3">
                                <input type="text" name="provincia" value="{{ $provincia }}" class="form-control" placeholder="Provincia">
                            </div>

                            <div class="form-group col-md-3">
                                <input type="text" name="localidad" value="{{ $localidad }}" class="form-control" placeholder="Localidad">
                            </div>

                            <div class="form-group col-md-3">
                                <input type="text" name="calle" value="{{ $calle }}" class="form-control" placeholder="Calle">
                            </div>
                        </div>

                        <div class="form-group col-md-3">
                            <button type="submit" class="btn btn-danger">
                                PDF
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



    <div id="Filtrar" class="modal" tabindex="-1" role="dialog">
        <div class="modal-dialog" role="document">
          <div class="modal-content">
            <div class="modal-header">
              <h5 class="modal-title">Filtrar personal
              <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">&times;</span>
              </button></h5>
            </div>
            <div class="modal-body">
                <div class="row">
                    {!! Form::open(['route' => 'proyectos.index', 'method' => 'GET', 'form-inline pull-right']) !!}
                        <div class="form-group col-md-3">
                            <input type="text" name="codigo" value="{{ $codigo }}" class="form-control" placeholder="Código">
                        </div>

                        <div class="form-group col-md-3">
                            <input type="text" name="tipo" value="{{ $tipo }}" class="form-control" placeholder="Tipo">
                        </div>

                        <div class="form-group col-md-3">
                            <input type="text" name="comitente" value="{{ $comitente }}" class="form-control" placeholder="Comitente">
                        </div>

                        <div class="form-group col-md-3">
                            <input type="text" name="provincia" value="{{ $provincia }}" class="form-control" placeholder="Provincia">
                        </div>

                        <div class="form-group col-md-3">
                            <input type="text" name="localidad" value="{{ $localidad }}" class="form-control" placeholder="Localidad">
                        </div>

                        <div class="form-group col-md-3">
                            <input type="text" name="calle" value="{{ $calle }}" class="form-control" placeholder="Calle">
                        </div>

                        <div class="form-group col-md-3 pull-right">
                            <button type="submit" class="btn btn-danger pull-right">
                                <span class="glyphicon glyphicon-search"></span>
                            </button>
                        </div>
                    {!! Form::close() !!}
                </div>
            </div>
            <div class="modal-footer">
              <button type="button" class="btn btn-primary">Save changes</button>
              <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
            </div>
          </div>
        </div>
      </div>
@endsection

