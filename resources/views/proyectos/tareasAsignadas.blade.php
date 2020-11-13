<div id="#PruebaModal{{ $Personal->id }}" class="modal" tabindex="-1" role="dialog">
    <div class="modal-dialog" role="document">
      <div class="modal-content">
        <div class="modal-header" style="background-color: rgb(255, 55, 55)">
          <h5 class="modal-title">Modal title</h5>
          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button>
        </div>
        <div class="modal-body">
            <section class="content-header">
                <h1 style="color: aliceblue" class="pull-left">Tareas por desarrollar</h1><br>
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
                        <table id="Personal" class="table table-striped table-bordered">
                            <thead>
                                <tr>
                                    <th>Nombre</th>
                                    <th>Responsabilidad</th>
                                    <th>Proyecto</th>
                                    <th>Acciones</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($Lista_personal as $Personal )
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
                        <table id="Personal2" class="table table-striped table-bordered">
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
                        <table id="Personal3" class="table table-striped table-bordered">
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
