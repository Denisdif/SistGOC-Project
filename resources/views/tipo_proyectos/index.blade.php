@extends('layouts.app')

@section('css')
    @include('layouts.datatables_css')
@endsection

@section('content')

    <div class="content">
        <div class="clearfix"></div>

        @include('flash::message')

        <div class="clearfix"></div>
        <div class="box box-danger">
            <div class="box-body">
                <section class="content-header">
                    <h1>Tipos de proyectos
                        <div class="pull-right">
                            <a class="btn btn-danger" style="margin-top: -10px;margin-bottom: 5px" href="{{ route('tipoProyectos.create') }}">Nuevo</a>
                        </div>
                    </h1>
                </section>
                <hr>
                <div class="content">
                    <table class="table datatables table-striped table-bordered">
                        <thead>
                            <tr>
                                <th>Nombre</th>
                                <th>Acciones</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($tipos_proyectos as $item)
                            <tr>
                                <td>{{ $item->Nombre }}</td>
                                <td>{!! Form::open(['route' => ['tipoProyectos.destroy', $item->id], 'method' => 'delete']) !!}
                                    <div class='btn-group'>
                                        <a href="{{ route('tipoProyectos.show', $item->id) }}" class='btn btn-default btn-xs'>
                                            <i class="glyphicon glyphicon-eye-open"></i>
                                        </a>
                                        @if (Auth :: user()->Rol_id == 1)
                                            <a href="{{ route('tipoProyectos.edit', $item->id) }}" class='btn btn-default btn-xs'>
                                                <i class="glyphicon glyphicon-edit"></i>
                                            </a>
                                        @endif
                                        {!! Form::button('<i class="glyphicon glyphicon-trash"></i>', [
                                                'type' => 'submit',
                                                'class' => 'btn btn-danger btn-xs',
                                                'onclick' => "return confirm('Esta seguro que desea eliminar este tipo de proyecto?')"
                                            ]) !!}
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
        <div class="text-center">

        </div>
    </div>
@endsection

@section('scripts')
    @include('layouts.datatables_js')
@endsection

