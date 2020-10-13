@extends('layouts.app')

@section('content')

    <section class="content-header">
        <h1 style="color: aliceblue">
            Proyecto
        </h1>
    </section>

    <div class="content">
        <div class="box box-danger">
            <div class="box-body">
                <div class="row" style="padding-left: 20px">
                    @section('css')
                        @include('layouts.datatables_css')
                    @endsection

                    @include('proyectos.show_fields')

                    @section('scripts')
                        @include('layouts.datatables_js')
                    @endsection

                </div>

                <div class="form-group col-sm-6">
                    <a class="btn btn-danger"  href="/proyectos/{{$proyecto->id}}/proyectoAmbientes">Informe Completo</a>
                    <a href="{{ route('proyectos.index') }}" class="btn btn-default ">Back</a>
                </div>
            </div>
        </div>
    </div>

    <section class="content-header">
        <h1 style= "color: aliceblue">
            Ambientes del proyecto
            <a class="btn btn-danger pull-right" style="margin-top: -10px;margin-bottom: 5px" href="/proyectos/{{$proyecto->id}}/proyectoAmbientes/create">Add New</a>
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
                            <th>Acción</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($ambientesDelProyecto as $ambiente)
                        <tr>
                            <td>
                                @foreach ($Lista_ambientes as $item)
                                    @php
                                        if ($item->id == $ambiente->Ambiente_id){
                                            echo $item->Nombre_ambiente;
                                        }
                                    @endphp
                            @endforeach
                        </td>
                            <td>{{ $ambiente->Cantidad }}</td>
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

    {{-- Fin de DataTable de ambientes del proyecto --}}

    <section class="content-header">
        <h1 style= "color: aliceblue">
            Tareas del proyecto
            <a class="btn btn-danger pull-right" style="margin-top: -10px;margin-bottom: 5px" href="/proyectos/{{$proyecto->id}}/tareas/create">Add New</a>
        </h1>
    </section>

    {{-- Inicio de DataTable de tareas del proyecto --}}

    <div class="content-header">
        <div class="box box-danger">
            <div class="box-body">
                <table id="TareasDelProyecto" class="table table-striped table-bordered">
                    <thead>
                        <tr>
                            <th>Nombre</th>
                            <th>Valor</th>
                            <th>Accion</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($tareasDelProyecto as $tarea)
                        <tr>
                            <td>{{ $tarea->Nombre_tarea }}</td>
                            <td>{{ $tarea->Valor }}</td>
                            <td>{!! Form::open(['route' => ['tareas.destroy', $tarea->id], 'method' => 'delete']) !!}
                                <div class='btn-group'>
                                    {!! Form::button('<i class="glyphicon glyphicon-trash"></i>', [
                                        'type' => 'submit',
                                        'class' => 'btn btn-danger btn-xs',
                                        'onclick' => "return confirm('Esta seguro que desea eliminar esta tarea?')"
                                    ]) !!}
                                    <a href="{{ route('tareas.show', $tarea->id) }}" class='btn btn-default btn-xs'>
                                        <i class="glyphicon glyphicon-eye-open"></i>
                                    </a>
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


    {{-- Fin de DataTable de tareas del proyecto --}}


@endsection
