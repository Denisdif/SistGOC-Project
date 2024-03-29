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
                        <h1 class="pull-left">Personal</h1>
                        <h1 class="pull-right">
                            {!! Form::open(['route' => 'PDF.personalsPDF', 'form-inline pull-right']) !!}
                        <div style="display: none">
                                <div class="form-group col-md-3">
                                    <input type="text" name="Nombre" value="{{ $Nombre }}" class="form-control" placeholder="Nombre">
                                </div>

                                <div class="form-group col-md-3">
                                    <input type="text" name="Apellido" value="{{ $Apellido }}" class="form-control" placeholder="Apellido">
                                </div>

                                <div class="form-group col-md-3">
                                    <input type="text" name="rol" value="{{ $Rol }}" class="form-control" placeholder="Rol">
                                </div>

                                <div class="form-group col-md-3">
                                    <input type="number" name="mayorQ" value="{{ $MayorQ }}" class="form-control" placeholder="Mayor que">
                                </div>

                                <div class="form-group col-md-3">
                                    <input type="number" name="menorQ" value="{{ $MenorQ }}" class="form-control" placeholder="Menor que">
                                </div>
                        </div>
                            <button class="btn btn-secundary" data-toggle="modal" data-target="#Filtrar" type="button">Filtrar</button>
                            <button class="btn btn-secundary" type="submit" >PDF</button>
                            @if (Auth::user()->Rol_id == 1)
                            <a class="btn btn-danger" href="{{ route('personals.create') }}">Nuevo</a>
                            @endif
                    {!! Form::close() !!}
                        </h1>
                    </section>
                {{-- Fin de Titulo y campos ocultos de filtros --}}
                <br><hr>
                <div class="content">
                    <table class="table datatables table-striped table-bordered">
                        <thead>
                            <tr>
                                <th>Nombre completo</th>
                                <th>Legajo</th>
                                <th>DNI</th>
                                <th>Edad</th>
                                <th>Rol</th>
                                <th>Acciones</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($ListaPersonal as $personal)
                            <tr>
                                <td>{{ $personal->NombrePersonal }} {{ $personal->ApellidoPersonal }}</td>
                                <td>{{ $personal->id }}</td>
                                <td>{{ $personal->DNI }}</td>
                                <td>{{ $personal->edad() }} años</td>
                                <td>{{ $personal->User->rol->NombreRol }}</td>
                                <td>{!! Form::open(['route' => ['personals.destroy', $personal->id], 'method' => 'delete']) !!}
                                    <div class='btn-group'>
                                        <a href="{{ route('personals.show', $personal->id) }}" class='btn btn-default btn-xs'>
                                            <i class="glyphicon glyphicon-eye-open"></i>
                                        </a>
                                        @if (Auth :: user()->Rol_id == 1)
                                            <a href="{{ route('personals.edit', $personal->id) }}" class='btn btn-default btn-xs'>
                                                <i class="glyphicon glyphicon-edit"></i>
                                            </a>
                                            {{--  {!! Form::button('<i class="glyphicon glyphicon-trash"></i>', [
                                                'type' => 'submit',
                                                'class' => 'btn btn-danger btn-xs',
                                                'onclick' => "return confirm('Esta seguro que desea eliminar esta tarea?')"
                                            ]) !!}  --}}
                                        @endif
                                    </div>
                                    {!! Form::close() !!}
                                </td>
                            </tr>
                            @endforeach
                        </tbody>
                    </table>

                </div>
            </div>
        </div>
    </div>

    {{-- Inicio de modal de filtros de Personal --}}
        <div id="Filtrar" class="modal" tabindex="-1" role="dialog">
            <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header" style="background-color: rgb(223, 43, 61)">
                    <h5 class="modal-title"> <b style="color: white"> Filtrar personal </b>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button></h5>
                </div>
                <div class="modal-body">
                    <div class="row">
                        {!! Form::open(['route' => 'personals.index', 'method' => 'GET', 'form-inline pull-right']) !!}
                            <div class="form-group col-md-6">
                                <label>Nombre</label>
                                <input type="text" name="Nombre" value="{{ $Nombre }}" class="form-control" {{-- placeholder="Nombre" --}}>
                            </div>

                            <div class="form-group col-md-6">
                                <label>Apellido</label>
                                <input type="text" name="Apellido" value="{{ $Apellido }}" class="form-control"{{-- placeholder="Apellido" --}}>
                            </div>

                            <div class="form-group col-md-6">
                                <label>Mayor que</label>
                                <input type="number" name="mayorQ" value="{{ $MayorQ }}" class="form-control"{{-- placeholder="Mayor que" --}}>
                            </div>

                            <div class="form-group col-md-6">
                                <label>Menor que</label>
                                <input type="number" name="menorQ" value="{{ $MenorQ }}" class="form-control"{{-- placeholder="Menor que" --}}>
                            </div>

                            <div class="form-group col-md-6">
                                <label>Rol</label>
                                <select class="form-control" name="rol" id="" value="{{ $Rol }}">
                                    <option value="">Ninguno</option>
                                    <option value="Administrador">Administrador</option>
                                    <option value="Director de proyectos">Director de proyectos</option>
                                    <option value="Desarrollador">Desarrollador</option>
                                    <option value="Auditor">Auditor</option>
                                </select>
                            </div>

                            {{-- <div class="form-group col-md-3">
                                <input type="date" name="desde" class="form-control" placeholder="Desde">
                            </div>

                            <div class="form-group col-md-3">
                                <input type="date" name="hasta" class="form-control" placeholder="Hasta">
                            </div>  --}}
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="submit" class="btn btn-danger">Filtrar</button>
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Cerrar</button>
                {!! Form::close() !!}
                </div>
            </div>
            </div>
        </div>
    {{-- Fin de modal de filtros de Personal --}}
@endsection

@section('scripts')
    @include('layouts.datatables_js')
@endsection


