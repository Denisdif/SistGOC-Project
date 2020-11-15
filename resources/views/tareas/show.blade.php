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

                    <div class="col-md-6 mb-6">
                        <h2>Responsables</h2><br>
                        @foreach ($asignaciones as $asignacion)
                        <b>{{$asignacion->Personal->NombrePersonal." ".$asignacion->Personal->ApellidoPersonal}}:</b> {{ $asignacion->Responsabilidad }} <br>
                        @endforeach
                        <br>
                        <a class="btn btn-danger" href="/tareas/{{$tarea->id}}/asignacionPersonalTareas/create">Editar</a>
                    </div>


                    @section('scripts')
                        @include('layouts.datatables_js')
                    @endsection
                </div>
            </div>
        </div>
    </div>

    {{--<section class="content-header">
        <h1 style= "color: aliceblue">
            Personal responsable
            <a class="btn btn-danger pull-right" style="margin-top: -10px;margin-bottom: 5px" href="/tareas/{{$tarea->id}}/asignacionPersonalTareas/create">Nueva asignación</a>
        </h1>
    </section>

     Inicio DataTable Personal Responsable
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
                                $asignacion->Personal->NombrePersonal." ".$asignacion->Personal->ApellidoPersonal;
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
    </div>
     Fin DataTable Personal Responsable --}}

    {{-- Inicio DataTable Entregas --}}
    <div class="content-header">
        <div class="box box-danger">
            <section class="content-header">
                <br><h1>
                    Datos de entrega
                </h1><br>
            </section>
            <div class="box-body">
                <table class="table table-striped table-bordered">
                    <tbody>
                        <tr>
                            <td>Fecha limite de entrega</td>
                            <td>{{ $tarea->Fecha_limite }}</td>
                        </tr>
                        <tr>
                            <td>Fecha de entrega</td>
                            <td>{{ $tarea->Fecha_fin }}</td>
                        </tr>
                        <tr>
                            <td>Archivos</td>
                            <td>
                            @foreach ($entregas as $entrega)
                            {{ $entrega->Archivo }} <br>
                            @endforeach
                            </td>
                        </tr>
                        <tr>
                            <td>Comentarios</td>
                            <td>
                                @foreach ($comentarios as $comentario)
                                <b>{{ $comentario->personal->NombrePersonal }} {{ $comentario->personal->ApellidoPersonal }}</b><br>
                                {{ $comentario->Contenido }}<br>
                                <p style="color: rgb(185, 185, 185)">at {{ $comentario->created_at }}</p>
                                @endforeach
                                <a href="" class="" data-toggle="modal" data-target="#CrearComentario" type="button">Comentar</a>
                            </td>
                        </tr>
                    </tbody>
                </table>

                <div class="text-center">
                    <br>
                    @if ($tarea->Estado_tarea_id < 4)

                        <a class="btn btn-danger" href="/tareas/{{$tarea->id}}/entregas/create">Añadir entrega</a>
                    @else
                        <a class="btn btn-danger" href="/tareas/{{$tarea->id}}/entregas/create">Editar entrega</a>
                    @endif
                    @if ($tarea->Estado_tarea_id == 4)
                        <a href="/tareas/{{$tarea->id}}/aprobar" class="btn btn-danger">Aprobar</a>
                        <a href="/tareas/{{$tarea->id}}/desaprobar" class="btn btn-danger ">Desaprobar</a>
                    @endif

                </div>
            </div>
        </div>
        <a href="{{ route('proyectos.show', $tarea->Proyecto_id) }}" class="btn btn-danger " >Volver</a>
    </div>
    {{-- Fin DataTable Entregas --}}

    {{-- <section class="content-header">
        <h1 style= "color: aliceblue">
            Comentarios
            <a class="btn btn-danger pull-right" style="margin-top: -10px;margin-bottom: 5px" href="/tareas/{{$tarea->id}}/comentarios/create">Añadir comentario</a>
        </h1>
    </section>

    Inicio DataTable Comentarios
    <div class="content-header">
        <div class="box box-danger">
            <div class="box-body">
                <table id="Comentarios" class="table table-striped table-bordered">
                    <thead>
                        <tr>
                            <th>Comentario</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($comentarios as $comentario)
                        <tr>
                            <td>{{ $comentario->Contenido }}</td>
                        </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>
     Fin DataTable Comentarios --}}




    <div id="CrearComentario" class="modal" tabindex="-1" role="dialog">
        <div class="modal-dialog" role="document">
          <div class="modal-content">
            <div class="modal-header">
              <h5 class="modal-title">Modal title
              <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">&times;</span>
              </button></h5>
            </div>
            <div class="modal-body">
                {!! Form::open(['url' => "tareas/$tarea->id/comentarios"]) !!}

                    <!-- Contenido Field -->
                        {!! Form::label('Contenido', 'Comentario:') !!}
                        {!! Form::textarea('Contenido', null, ['class' => 'form-control']) !!} <br>

                    <!-- Submit Field -->
                        {!! Form::submit('Guardar', ['class' => 'btn btn-danger']) !!}
                        <button type="button" class="btn btn-default" data-dismiss="modal" aria-label="Close">Cerrar</button>
                    {!! Form::close() !!}
                </div>
            <div class="modal-footer">
            </div>
          </div>
        </div>
      </div>
@endsection
