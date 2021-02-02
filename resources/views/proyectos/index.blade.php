@extends('layouts.app')

@section('css')
    @include('layouts.datatables_css')
@endsection

@section('content')
    <div class="content">
        <div class="clearfix"></div>

        @include('flash::message')

        <div class="box box-danger">
            <div class="box-body">
                {{-- Titulo y campos ocultos de filtros --}}
                    <section class="content-header">
                        <h1 class="pull-left">Proyectos</h1>
                        <h1 class="pull-right">
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
                        <button class="btn btn-secundary" data-toggle="modal" data-target="#Filtrar" type="button">Filtrar</button>
                            <button class="btn btn-secundary" type="submit" >PDF</button>
                            <a class="btn btn-danger" href="{{ route('proyectos.create') }}">Nuevo</a>
                        {!! Form::close() !!}
                        </h1>
                    </section>
                {{-- Fin de Titulo y campos ocultos de filtros --}}
                <br><hr>
                <div class="box-body">
                    <ul class="nav nav-tabs" id="myTab" role="tablist">
                        <li class="nav-item active">
                            <a class="nav-link" id="profile-tab" data-toggle="tab" href="#En_desarrollo" role="tab" aria-controls="En_desarrollo" aria-selected="false">En desarrollo</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" id="profile-tab" data-toggle="tab" href="#Atrasados" role="tab" aria-controls="Atrasados" aria-selected="false">Atrasados</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" id="contact-tab" data-toggle="tab" href="#Finalizados" role="tab" aria-controls="Finalizados" aria-selected="false">Finalizados</a>
                        </li>
                    </ul>
                    <div class="tab-content" id="myTabContent">

                        <div class="tab-pane active" id="En_desarrollo" role="tabpanel" aria-labelledby="desarrollo-tab">
                            <div class="content">
                                @if ((Auth::user()->Rol_id == 2))
                                {{-- Tabla si es director de proyectos --}}
                                    <table class="table datatables table-striped table-bordered">
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
                                            @foreach ($proy_en_desarrollo as $proyecto)
                                            @if($proyecto->Director_id == Auth::user()->id )
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
                                                            'onclick' => "return confirm('Está seguro que desea eliminar este proyecto?')"
                                                        ]) !!}
                                                    </div>
                                                    {!! Form::close() !!}
                                                </td>
                                            </tr>
                                            @endif
                                            @endforeach
                                        </tbody>
                                    </table>
                                @else
                                {{-- Tabla si es admin --}}
                                    <table class="table datatables table-striped table-bordered">
                                        <thead>
                                            <tr>
                                                <th>Codigo</th>
                                                <th>Tipo de proyecto</th>
                                                <th>Comitente</th>
                                                <th>Director</th>
                                                <th>Dirección</th>
                                                <th>Acciones</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            @foreach ($proy_en_desarrollo as $proyecto)
                                            <tr>
                                                <td>{{ $proyecto->id }}</td>
                                                <td>{{ $proyecto->tipo_proyecto->Nombre }}</td>
                                                <td>{{ $proyecto->comitente->ApellidoComitente }} {{ $proyecto->comitente->NombreComitente }}</td>
                                                <td>{{ $proyecto->director->ApellidoPersonal }} {{ $proyecto->director->NombrePersonal }}</td>
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
                                @endif
                            </div>
                        </div>
                        <div class="tab-pane fade" id="Atrasados" role="tabpanel" aria-labelledby="atrasados-tab">
                            <div class="content">
                                @if ((Auth::user()->Rol_id == 2))
                                {{-- Tabla si es director de proyectos --}}
                                    <table class="table datatables table-striped table-bordered">
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
                                            @foreach ($proy_atrasados as $proyecto)
                                            @if($proyecto->Director_id == Auth::user()->id )
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
                                                            'onclick' => "return confirm('Está seguro que desea eliminar este proyecto?')"
                                                        ]) !!}
                                                    </div>
                                                    {!! Form::close() !!}
                                                </td>
                                            </tr>
                                            @endif
                                            @endforeach
                                        </tbody>
                                    </table>
                                @else
                                {{-- Tabla si es admin --}}
                                    <table class="table datatables table-striped table-bordered">
                                        <thead>
                                            <tr>
                                                <th>Codigo</th>
                                                <th>Tipo de proyecto</th>
                                                <th>Comitente</th>
                                                <th>Director</th>
                                                <th>Dirección</th>
                                                <th>Acciones</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            @foreach ($proy_atrasados as $proyecto)
                                            <tr>
                                                <td>{{ $proyecto->id }}</td>
                                                <td>{{ $proyecto->tipo_proyecto->Nombre }}</td>
                                                <td>{{ $proyecto->comitente->ApellidoComitente }} {{ $proyecto->comitente->NombreComitente }}</td>
                                                <td>{{ $proyecto->director->ApellidoPersonal }} {{ $proyecto->director->NombrePersonal }}</td>
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
                                @endif
                            </div>
                        </div>
                        <div class="tab-pane fade" id="Finalizados" role="tabpanel" aria-labelledby="finalizados-tab">
                            <div class="content">
                                @if ((Auth::user()->Rol_id == 2))
                                {{-- Tabla si es director de proyectos --}}
                                    <table class="table datatables table-striped table-bordered">
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
                                            @foreach ($proy_finalizados as $proyecto)
                                            @if($proyecto->Director_id == Auth::user()->id )
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
                                                            'onclick' => "return confirm('Está seguro que desea eliminar este proyecto?')"
                                                        ]) !!}
                                                    </div>
                                                    {!! Form::close() !!}
                                                </td>
                                            </tr>
                                            @endif
                                            @endforeach
                                        </tbody>
                                    </table>
                                @else
                                {{-- Tabla si es admin --}}
                                    <table class="table datatables table-striped table-bordered">
                                        <thead>
                                            <tr>
                                                <th>Codigo</th>
                                                <th>Tipo de proyecto</th>
                                                <th>Comitente</th>
                                                <th>Director</th>
                                                <th>Dirección</th>
                                                <th>Acciones</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            @foreach ($proy_finalizados as $proyecto)
                                            <tr>
                                                <td>{{ $proyecto->id }}</td>
                                                <td>{{ $proyecto->tipo_proyecto->Nombre }}</td>
                                                <td>{{ $proyecto->comitente->ApellidoComitente }} {{ $proyecto->comitente->NombreComitente }}</td>
                                                <td>{{ $proyecto->director->ApellidoPersonal }} {{ $proyecto->director->NombrePersonal }}</td>
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
                                @endif
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    {{-- Inicio de modal de filtros de proyectos --}}
        <div id="Filtrar" class="modal" tabindex="-1" role="dialog">
            <div class="modal-dialog" role="document">
                <div class="modal-content">
                    <div class="modal-header" style="background-color: rgb(223, 43, 61)">
                        <h5 class="modal-title"> <b style="color: white"> Filtrar proyectos </b>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button></h5>
                    </div>
                    <div class="modal-body">
                        <div class="row">
                            {!! Form::open(['route' => 'proyectos.index', 'method' => 'GET', 'form-inline pull-right']) !!}
                                <div class="form-group col-md-6">
                                    <input type="text" name="codigo" value="{{ $codigo }}" class="form-control" placeholder="Código">
                                </div>

                                <div class="form-group col-md-6">
                                    <input type="text" name="tipo" value="{{ $tipo }}" class="form-control" placeholder="Tipo">
                                </div>

                                <div class="form-group col-md-6">
                                    <input type="text" name="comitente" value="{{ $comitente }}" class="form-control" placeholder="Comitente">
                                </div>

                                <div class="form-group col-md-6">
                                    <input type="text" name="provincia" value="{{ $provincia }}" class="form-control" placeholder="Provincia">
                                </div>

                                <div class="form-group col-md-6">
                                    <input type="text" name="localidad" value="{{ $localidad }}" class="form-control" placeholder="Localidad">
                                </div>

                                <div class="form-group col-md-6">
                                    <input type="text" name="calle" value="{{ $calle }}" class="form-control" placeholder="Calle">
                                </div>

                        </div>
                    </div>
                    <div class="modal-footer">
                            <button type="submit" class="btn btn-danger">
                                Filtrar
                            </button>
                            <button type="button" class="btn btn-secondary" data-dismiss="modal">Cerrar</button>
                    </div>
                    {!! Form::close() !!}
                </div>
            </div>
        </div>
    {{-- Fin de modal de filtros de proyectos --}}

@endsection

@section('scripts')
    @include('layouts.datatables_js')
@endsection
