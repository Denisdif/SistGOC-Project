@extends('layouts.app')

@section('content')

    {{-- Fin de DataTable de Personal del proyecto --}}

    <section class="content-header">
        <h1 style= "color: aliceblue">
            Ambientes cargados al proyecto
        </h1>
    </section>


    {{-- Inicio de DataTable de ambientes del proyecto --}}


    <div class="content-header">
        <div class="box box-danger">
            <div class="box-body">
                <table id="Nose" class="table table-striped table-bordered">
                    <thead>
                        <tr>
                            <th>Nombre</th>
                            <th>Cantidad</th>
                            <th>Descripción</th>
                            <th>Acciones</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($ambientesDelProyecto as $ambiente)
                        <tr>
                            <td>{{ $ambiente->ambiente->Nombre_ambiente }}</td>
                            <td>{{ $ambiente->Cantidad }}</td>
                            <td>{{ $ambiente->ambiente->Descripcion }}</td>
                            <td>{!! Form::open(['route' => ['proyectoAmbientes.destroy', $ambiente->id], 'method' => 'delete']) !!}
                                <div class='btn-group'>
                                    {!! Form::button('<i class="glyphicon glyphicon-trash"></i>', [
                                        'type' => 'submit',
                                        'class' => 'btn btn-danger btn-xs',
                                        'onclick' => "return confirm('Esta seguro que desea eliminar este ambiente?')"
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

    {{--Fin de DataTable de ambientes del proyecto --}}

    <section class="content-header">
        <h1 style="color: aliceblue">
            Cargar ambientes
        </h1>



    </section>
    <div class="content">
        @include('adminlte-templates::common.errors')
        <div class="box box-danger">
            <div class="box-body">
                <div class="row">
                    @section('css')
                        @include('layouts.datatables_css')
                    @endsection
                    {!! Form::open(['url' => "proyectos/$proyecto->id/proyectoAmbientes"]) !!}

                        @include('proyecto_ambientes.fields')

                    {!! Form::close() !!}
                    @section('scripts')
                        @include('layouts.datatables_js')
                    @endsection
                </div>
            </div>
        </div>

    </div>



@endsection
