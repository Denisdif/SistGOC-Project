@extends('layouts.app')

@section('content')
    <section class="content-header">
        <h1 style="color: aliceblue">
            Tarea
        </h1>
    </section>
    <div class="content">
        <div class="box box-danger">
            <div class="box-body">
                <div class="row" style="padding-left: 20px">
                    @section('css')
                        @include('layouts.datatables_css')
                    @endsection

                    @include('tareas.show_fields')

                    @section('scripts')
                        @include('layouts.datatables_js')
                    @endsection
                </div>
            </div>
        </div>
    </div>

    <section class="content-header">
        <h1 style= "color: aliceblue">
            Personal responsable
            <a class="btn btn-danger pull-right" style="margin-top: -10px;margin-bottom: 5px" href="/tareas/{{$tarea->id}}/asignacionPersonalTareas/create">Nueva asignación</a>
        </h1>
    </section>

    <div class="content-header">
        <div class="box box-danger">
            <div class="box-body">
                <table id="Nose" class="table table-striped table-bordered">
                    <thead>
                        <tr>
                            <th>Nombre</th>
                            <th>Responsailidad</th>
                            <th>Acción</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($asignaciones as $asignacion)
                        <tr>
                            <td>
                                @foreach ($listaPersonal as $item)
                                    @php
                                        if ($item->id == $asignacion->Personal_id){
                                            echo $item->NombrePersonal;
                                        }
                                    @endphp
                            @endforeach
                        </td>
                            <td>{{ $asignacion->Responsabilidad }}</td>
                            <td>{!! Form::open(['route' => ['asignacionPersonalTareas.destroy', $asignacion->id], 'method' => 'delete']) !!}
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
        <a href="{{ route('proyectos.show', $tarea->Proyecto_id) }}" class="btn btn-danger pull-right" style="margin-top: -10px;margin-bottom: 5px">Volver</a>
    </div>
@endsection
