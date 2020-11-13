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
                <div class="col-md-6 mb-6">
                    <a class="btn btn-danger"  href="">Informe Completo</a>
                    <a class="btn btn-danger" href="/proyectos/{{$proyecto->id}}/proyectoAmbientes/create">Editar lista de ambientes</a>
                </div>
            </div>
        </div>
    </div>



    <section class="content-header">
        <h1 style= "color: aliceblue">
            Tareas del proyecto
            <a class="btn btn-danger pull-right" style="margin-top: -10px;margin-bottom: 5px" href="/proyectos/{{$proyecto->id}}/tareas/create">Agregar tareas</a>
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
                            <th>Prioridad</th>
                            <th>Estado</th>
                            <th>Tipo de tarea</th>
                            <th>Fecha inicio</th>
                            <th>Fecha fin</th>
                            <th>Acciones</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($tareasDelProyecto as $tarea)
                        <tr>
                            <td>{{ $tarea->Nombre_tarea }}</td>
                            <td>{{ $tarea->prioridad }}</td>
                            <td>{{ $tarea->estado_tarea->Nombre_estado_tarea }}</td>
                            <td>{{ $tarea->tipo_tarea->Nombre_tipo_tarea }}</td>
                            <td>{{ $tarea->Fecha_inicio }}</td>
                            <td>{{ $tarea->Fecha_fin }}</td>
                            <td>{!! Form::open(['route' => ['tareas.destroy', $tarea->id], 'method' => 'delete']) !!}
                                <div class='btn-group'>
                                    <a href="{{ route('tareas.show', $tarea->id) }}" class='btn btn-default btn-xs'>
                                        <i class="glyphicon glyphicon-eye-open"></i>
                                    </a>
                                    <a href="{{ route('tareas.edit', $tarea->id) }}" class='btn btn-default btn-xs'>
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
            </div>
        </div>
        </div>

    {{-- Fin de DataTable de tareas del proyecto --}}

    <section class="content-header">
        <h1 style= "color: aliceblue">
            Personal que participa en el proyecto
        </h1>
    </section>

    {{-- Inicio de DataTable de Personal del proyecto --}}

    <div class="content-header">
        <div class="box box-danger">
            <div class="box-body">
                <table id="PersonalDelProyecto" class="table table-striped table-bordered">
                    <thead>
                        <tr>
                            <th>Nombre completo</th>
                            <th>Cantidad de tareas</th>
                            <th>Acciones</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($Lista_personal as $Personal)
                        <tr>
                            <td>{{ $Personal->NombrePersonal }} {{ $Personal->ApellidoPersonal }}</td>
                            <td>{{ $Personal->cantTareas2() }}</td>
                            <td><button class="btn" data-toggle="modal" data-target="#PruebaModal{{$Personal->id}}" type="button">Modal</button></td>
                        </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>

        </div>

        {{-- Fin de DataTable de Personal del proyecto --}}

    {{--<section class="content-header">
        <h1 style= "color: aliceblue">
            Ambientes del proyecto
            <a class="btn btn-danger pull-right" style="margin-top: -10px;margin-bottom: 5px" href="/proyectos/{{$proyecto->id}}/proyectoAmbientes/create">Agregar ambientes</a>
        </h1>
    </section>--}}


    {{-- Inicio de DataTable de ambientes del proyecto --}}


    {{--<div class="content-header">
        <div class="box box-danger">
            <div class="box-body">
                <table id="Nose" class="table table-striped table-bordered">
                    <thead>
                        <tr>
                            <th>Nombre</th>
                            <th>Cantidad</th>
                            <th>Descripción</th>
                            <th>Imagen</th>
                            <th>Acciones</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($ambientesDelProyecto as $ambiente)
                        <tr>
                            <td>{{ $ambiente->ambiente->Nombre_ambiente }}</td>
                            <td>{{ $ambiente->Cantidad }}</td>
                            <td>{{ $ambiente->ambiente->Descripcion }}</td>
                             <td> <img src="{{ $ambiente->ambiente->Imagen }}" class="card-img" width="100" height="100"> </td>
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
    </div> --}}

    {{--Fin de DataTable de ambientes del proyecto --}}
    <a href="{{ route('proyectos.index') }}" class="btn btn-danger pull-right" style="margin-top: -10px;margin-bottom: 5px ">Volver</a>
    </div>
</div>

@foreach ($Lista_personal as $Personal)
<div id="PruebaModal{{$Personal->id}}" class="modal" tabindex="-1" role="dialog">
    <div class="modal-dialog" role="document">
      <div class="modal-content">
        <div class="modal-header" style="background-color: rgb(255, 55, 55)">
          <h5 style= "color: aliceblue">Modal title
          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button></h5>
        </div>
        <div class="modal-body" style="background-image: url('/images/Captura.jpg'); background-size: 100%; background-opacity: 0.5">
            <section class="content-header">
                <h1 style= "color: aliceblue">Tareas por desarrollar</h1>
            </section>
            <div class="content">
                <div class="clearfix"></div>

                @include('flash::message')

                <div class="clearfix"></div>
                <div class="box box-danger">
                    <div class="box-body">
                        @section('css')
                        @include('layouts.datatables_css')
                    @endsection
                        <table  id="Personal" class="datatables table  table-bordered">
                            <thead>
                                <tr>
                                    <th>Nombre</th>
                                    <th>Responsabilidad</th>
                                    <th>Proyecto</th>
                                    <th>Acciones</th>
                                </tr>
                            </thead>
                            <tbody>
                                        @foreach (($Personal->tareasAsignadas()) as $asignacion)
                                            @if ($asignacion->Responsabilidad == "Desarrollador")
                                                <tr>
                                                <td>{{ $asignacion->tarea->Nombre_tarea }}</td>
                                                <td>{{ $asignacion->Responsabilidad }}</td>
                                                <td>{{ $asignacion->tarea->proyecto->Nombre_proyecto }}</td>
                                                <td>
                                                    <a href="{{ route('tareas.show', $asignacion->Tarea_id) }}" class='btn btn-default btn-xs'>
                                                        <i class="glyphicon glyphicon-eye-open"></i>
                                                    </a>
                                                </td>
                                                </tr>
                                            @endif
                                        @endforeach

                            </tbody>
                        </table>
                        @section('scripts')
                            @include('layouts.datatables_js')
                        @endsection
                    </div>
                </div>
            </div>

            <section class="content-header">
                <h1 style= "color: aliceblue">
                    Tareas por aprobar
                </h1>
            </section>

            <div class="content">
                <div class="clearfix"></div>

                @include('flash::message')

                <div class="clearfix"></div>
                <div class="box box-danger">
                    <div class="box-body">
                        <table id="Personal2" class="datatables table table-striped table-bordered">
                            <thead>
                                <tr>
                                    <th>Nombre</th>
                                    <th>Responsabilidad</th>
                                    <th>Proyecto</th>
                                    <th>Acciones</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach (($Personal->tareasAsignadas()) as $asignacion)
                                    @if ($asignacion->Responsabilidad == "Aprobador")
                                        <tr>
                                        <td>{{ $asignacion->tarea->Nombre_tarea }}</td>
                                        <td>{{ $asignacion->Responsabilidad }}</td>
                                        <td>{{ $asignacion->tarea->proyecto->Nombre_proyecto }}</td>
                                        <td>
                                            <a href="{{ route('tareas.show', $asignacion->Tarea_id) }}" class='btn btn-default btn-xs'>
                                                <i class="glyphicon glyphicon-eye-open"></i>
                                            </a>
                                        </td>
                                        </tr>
                                    @endif
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>

            <section class="content-header">
                <h1 style= "color: aliceblue">
                    Tareas por supervisar
                </h1>
            </section>

            <div class="content">
                <div class="clearfix"></div>

                @include('flash::message')

                <div class="clearfix"></div>

                <div class="box box-danger">
                    <div class="box-body">
                        <table id="Personal3" class="datatables table table-striped table-bordered">
                            <thead>
                                <tr>
                                    <th>Nombre</th>
                                    <th>Responsabilidad</th>
                                    <th>Proyecto</th>
                                    <th>Acciones</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach (($Personal->tareasAsignadas()) as $asignacion)
                                    @if ($asignacion->Responsabilidad == "Supervisor")
                                        <tr>
                                        <td>{{ $asignacion->tarea->Nombre_tarea }}</td>
                                        <td>{{ $asignacion->Responsabilidad }}</td>
                                        <td>{{ $asignacion->tarea->proyecto->Nombre_proyecto }}</td>
                                        <td>
                                            <a href="{{ route('tareas.show', $asignacion->Tarea_id) }}" class='btn btn-default btn-xs'>
                                                <i class="glyphicon glyphicon-eye-open"></i>
                                            </a>
                                        </td>
                                        </tr>
                                    @endif
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-secondary" data-dismiss="modal">Cerrar</button>
        </div>
      </div>
    </div>
</div>

@endforeach

@endsection
