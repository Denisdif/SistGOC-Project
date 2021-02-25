@extends('layouts.app')

@section('content')

    @if(Auth::user()->Rol_id == 3)

    <div class="content">
        <div class="clearfix"></div>

        @include('flash::message')

        <div class="clearfix"></div>
        <div class="box box-danger">
            <div class="box-body">

                <section class="content-header">
                    <h1 class="pull-left">Tareas por desarrollar</h1>
                </section>
                <br><br>

                <div class="content">

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
                                        <th>Estado</th>
                                       {{--   <th>Proyecto</th> --}}
                                        <th>Fecha límite</th>
                                        <th>Acciones</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach (($personal->tareasAsignadas()) as $asignacion)
                                        @if ($asignacion->Responsabilidad == "Responsable")
                                            <tr>
                                                <td>{{ $asignacion->tarea->Nombre_tarea }}</td>
                                                <td>{{ $asignacion->tarea->estado_tarea->Nombre_estado_tarea }}</td>
                                               {{--   <td>{{ $asignacion->tarea->proyecto->Nombre_proyecto }}</td>  --}}
                                                <td>{{ $asignacion->tarea->getFechaLimite() }}</td>
                                                <td>
                                                    @if ($asignacion->tarea->Estado_tarea_id == 2)
                                                        <a onclick="return confirm('Iniciar desarrollo de la tarea?')" href="{{ route('tareas.show', $asignacion->Tarea_id) }}" class='btn btn-default btn-xs'>
                                                            Desarrollar
                                                        </a>
                                                    @else
                                                        <a href="{{ route('tareas.show', $asignacion->Tarea_id) }}" class='btn btn-default btn-xs'>
                                                            <i class="glyphicon glyphicon-eye-open"></i>
                                                        </a>
                                                    @endif
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
                                        <th>Estado</th>
                                       {{--   <th>Proyecto</th> --}}
                                        <th>Fecha límite</th>
                                        <th>Acciones</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach (($personal->tareasAsignadas()) as $asignacion)
                                        @if ($asignacion->Responsabilidad == "Colaborador")
                                            <tr>
                                                <td>{{ $asignacion->tarea->Nombre_tarea }}</td>
                                                <td>{{ $asignacion->tarea->estado_tarea->Nombre_estado_tarea }}</td>
                                               {{--  <td>{{ $asignacion->tarea->proyecto->Nombre_proyecto }}</td> --}}
                                                <td>{{ $asignacion->tarea->getFechaLimite() }}</td>
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
        </div>

        <div class="box box-danger">
            <div class="box-body">

                <section class="content-header">
                    <h1 class="pull-left">Tareas aprobadas</h1>
                </section>
                <br><br>

                <div class="content">

                    <ul class="nav nav-tabs" id="myTab" role="tablist">
                        <li class="nav-item active">
                        <a class="nav-link active" id="home-tab" data-toggle="tab" href="#Tareas_responsable2" role="tab" aria-controls="Tareas_responsable2" aria-selected="true">Responsable</a>
                        </li>
                        <li class="nav-item">
                        <a class="nav-link" id="profile-tab" data-toggle="tab" href="#Tareas_colaborador2" role="tab" aria-controls="Tareas_colaborador2" aria-selected="false">Colaborador</a>
                        </li>
                    </ul>
                    <div class="tab-content" id="myTabContent">
                        <div class="tab-pane active" id="Tareas_responsable2" role="tabpanel" aria-labelledby="Tareas_responsable2-tab">

                            <br>

                            <table class="datatables table table-striped table-bordered">
                                <thead>
                                    <tr>
                                        <th>Nombre</th>
                                        {{--   <th>Proyecto</th> --}}
                                        <th>Fecha de finalización</th>
                                        <th>Acciones</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($personal->asignacion as $asignacion)
                                        @if (($asignacion->Responsabilidad == "Responsable") and ($asignacion->tarea->estado_tarea->Nombre_estado_tarea) == ('Aprobada'))
                                            <tr>
                                            <td>{{ $asignacion->tarea->Nombre_tarea }}</td>
                                            {{-- <td>{{ $asignacion->tarea->proyecto->Nombre_proyecto }}</td> --}}
                                            <td>{{ $asignacion->tarea->getFechaFin() }}</td>
                                            <td>
                                                @if ($asignacion->tarea->Estado_tarea_id == 2)
                                                    <a onclick="return confirm('Iniciar desarrollo de la tarea?')" href="{{ route('tareas.show', $asignacion->Tarea_id) }}" class='btn btn-default btn-xs'>
                                                        Desarrollar
                                                    </a>
                                                @else
                                                    <a href="{{ route('tareas.show', $asignacion->Tarea_id) }}" class='btn btn-default btn-xs'>
                                                        <i class="glyphicon glyphicon-eye-open"></i>
                                                    </a>
                                                @endif

                                            </td>
                                            </tr>
                                        @endif
                                    @endforeach
                                </tbody>
                            </table>
                        </div>
                        <div class="tab-pane fade" id="Tareas_colaborador2" role="tabpanel" aria-labelledby="Tareas_colaborador2-tab">
                            <br>

                            <table class="datatables table table-striped table-bordered">
                                <thead>
                                    <tr>
                                        <th>Nombre</th>
                                       {{--   <th>Proyecto</th> --}}
                                        <th>Fecha de finalización</th>
                                        <th>Acciones</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($personal->asignacion as $asignacion)
                                        @if (($asignacion->Responsabilidad == "Colaborador") and ($asignacion->tarea->estado_tarea->Nombre_estado_tarea) == ('Aprobada'))
                                            <tr>
                                                <td>{{ $asignacion->tarea->Nombre_tarea }}</td>
                                            {{--      <td>{{ $asignacion->tarea->proyecto->Nombre_proyecto }}</td>  --}}
                                                <td>{{ $asignacion->tarea->getFechaFin() }}</td>
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
        </div>
    </div>

    @endif

    @if(Auth::user()->Rol_id == 2)

    <div class="content">
        <div class="box box-danger">
            <div class="box-body">

            <section class="content-header">
                <h1 class="pull-left">Tareas por revisar</h1>
            </section>
            <br><hr>

            <div class="content">
            <table class="datatables table table-striped table-bordered">
                <thead>
                    <tr>
                        <th>Nombre</th>
                    {{--    <th>Proyecto</th> --}}
                        <th>Acciones</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach (($personal->tareas_corregir()) as $tarea)
                            <tr>
                            <td>{{ $tarea->Nombre_tarea }}</td>
                             {{--   <td>{{ $tarea->proyecto->Nombre_proyecto }}</td> --}}
                            <td>
                                <a href="{{ route('tareas.show', $tarea->id) }}" class='btn btn-default btn-xs'>
                                    <i class="glyphicon glyphicon-eye-open"></i>
                                </a>
                            </td>
                            </tr>
                    @endforeach
                </tbody>
            </table>

            </div>
            </div>
        </div>
    </div>

    @endif
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

    @section('css')
        @include('layouts.datatables_css')
    @endsection

    @section('scripts')
        @include('layouts.datatables_js')
    @endsection
@endsection

