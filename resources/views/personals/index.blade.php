@extends('layouts.app')

@section('content')
    <section class="content-header">
        <h1 style="color: aliceblue" class="pull-left">Personal</h1>

        @if (Auth::user()->Rol_id == 1)
            <h1 class="pull-right">
                <a class="btn btn-danger pull-right" style="margin-top: -10px;margin-bottom: 5px" href="{{ route('personals.create') }}">Cargar nuevo</a>
            </h1>
        @endif

    </section>
    <div class="content">
        <div class="clearfix"></div>

        @include('flash::message')

        <div class="clearfix"></div>

        <div>
            <div class="box box-danger">
                <div class="box-body">
                <h1>Filtrar personal</h1>
                    <br>
                    {!! Form::open(['route' => 'personals.index', 'method' => 'GET', 'form-inline pull-right']) !!}
                        <div class="form-group col-md-3">
                            <input type="text" name="Nombre" class="form-control" placeholder="Nombre">
                        </div>

                        <div class="form-group col-md-3">
                            <input type="text" name="Apellido" class="form-control" placeholder="Apellido">
                        </div>

                        <div class="form-group col-md-3">
                            <input type="text" name="rol" class="form-control" placeholder="Rol">
                        </div>

                        <div class="form-group col-md-3">
                            <input type="number" name="mayorQ" class="form-control" placeholder="Mayor que">
                        </div>

                        <div class="form-group col-md-3">
                            <input type="number" name="menorQ" class="form-control" placeholder="Menor que">
                        </div>

                        {{-- <div class="form-group col-md-3">
                            <input type="date" name="desde" class="form-control" placeholder="Desde">
                        </div>

                        <div class="form-group col-md-3">
                            <input type="date" name="hasta" class="form-control" placeholder="Hasta">
                        </div>  --}}

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
                                        {!! Form::button('<i class="glyphicon glyphicon-trash"></i>', [
                                            'type' => 'submit',
                                            'class' => 'btn btn-danger btn-xs',
                                            'onclick' => "return confirm('Esta seguro que desea eliminar esta tarea?')"
                                        ]) !!}
                                    @endif
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



