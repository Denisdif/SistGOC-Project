@extends('layouts.app')

@section('content')
    <section class="content-header">
        <h1 style="color: aliceblue" class="pull-left">Tareas por desarrollar</h1><br>
    </section>
    <div class="content">
        <div class="clearfix"></div>

        @include('flash::message')

        <div class="clearfix"></div>
        <div class="box box-danger">
            <div class="box-body">

                <ul class="nav nav-tabs" id="myTab" role="tablist">
                    <li class="nav-item active">
                      <a class="nav-link active" id="home-tab" data-toggle="tab" href="#Tareas_responsable" role="tab" aria-controls="Tareas_responsable" aria-selected="true">Responsable</a>
                    </li>
                    <li class="nav-item">
                      <a class="nav-link" id="profile-tab" data-toggle="tab" href="#Tareas_colaborador" role="tab" aria-controls="Tareas_colaborador" aria-selected="false">Colaborador</a>
                    </li>
                  </ul>
                  <div class="tab-content" id="myTabContent">
                    <div class="tab-pane active" id="Tareas_responsable" role="tabpanel" aria-labelledby="Tareas_responsable-tab">

                        <br>

                        <table class="datatables table table-striped table-bordered">
                            <thead>
                                <tr>
                                    <th>Nombre</th>
                                    <th>Responsabilidad</th>
                                    <th>Proyecto</th>
                                    <th>Acciones</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach (($personal->tareasAsignadas()) as $asignacion)
                                    @if ($asignacion->Responsabilidad == "Responsable")
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
                    <div class="tab-pane fade" id="Tareas_colaborador" role="tabpanel" aria-labelledby="Tareas_colaborador-tab">
                        <br>

                        <table class="datatables table table-striped table-bordered">
                            <thead>
                                <tr>
                                    <th>Nombre</th>
                                    <th>Responsabilidad</th>
                                    <th>Proyecto</th>
                                    <th>Acciones</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach (($personal->tareasAsignadas()) as $asignacion)
                                    @if ($asignacion->Responsabilidad == "Colaborador")
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

                @section('css')
                @include('layouts.datatables_css')
            @endsection

                @section('scripts')
                    @include('layouts.datatables_js')
                @endsection
            </div>
        </div>
    </div>

    {{--  <section class="content-header">
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
                <table class="datatables table table-striped table-bordered">
                    <thead>
                        <tr>
                            <th>Nombre</th>
                            <th>Responsabilidad</th>
                            <th>Proyecto</th>
                            <th>Acciones</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach (($personal->tareasAsignadas()) as $asignacion)
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
                <table class="datatables table table-striped table-bordered">
                    <thead>
                        <tr>
                            <th>Nombre</th>
                            <th>Responsabilidad</th>
                            <th>Proyecto</th>
                            <th>Acciones</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach (($personal->tareasAsignadas()) as $asignacion)
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
    </div>--}}
@endsection

