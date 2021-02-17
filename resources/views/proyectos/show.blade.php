@extends('layouts.app')

@section('content')

    <div class="content">
        @include('flash::message')
        <div class="box box-danger">
            <div class="box-body">
                <div class="row" style="padding-left: 20px">
                    @section('css')
                        @include('layouts.datatables_css')
                    @endsection

                    <section class="content-header">
                        <h1>Proyecto {{ $proyecto->id }}: {{ $proyecto->Tipo_proyecto->Nombre }} para {{ $proyecto->comitente->ApellidoComitente }} {{ $proyecto->comitente->NombreComitente }}</h1>
                    </section>
                    <hr>

                    @include('proyectos.show_fields')
                    <div class="col-md-12 mb-12">
                        <a class="btn btn-danger"  href="/proyectos/{{$proyecto->id}}/informe">Informe Completo</a>
                        <a class="btn btn-danger" href="/proyectos/{{$proyecto->id}}/autoAsignar">Asignación inteligente</a>
                    </div>
                </div>
            </div>
            <br>
            <div>
                <div class="content box box-danger">
                    <div class="box-body">
                        <ul class="nav nav-tabs" id="myTab" role="tablist">
                            <li class="nav-item active">
                                <a class="nav-link" id="profile-tab" data-toggle="tab" href="#tareas" role="tab" aria-controls="tareas" aria-selected="false">Tareas</a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link" id="profile-tab" data-toggle="tab" href="#personal" role="tab" aria-controls="personal" aria-selected="false">Personal</a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link" id="contact-tab" data-toggle="tab" href="#ambientes" role="tab" aria-controls="ambientes" aria-selected="false">Ambientes</a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link" id="contact-tab" data-toggle="tab" href="#finalizar" role="tab" aria-controls="finalizar" aria-selected="false">Finalizar</a>
                            </li>
                        </ul>
                        <div class="tab-content" id="myTabContent">
                            <div class="tab-pane fade" id="personal" role="tabpanel" aria-labelledby="personal-tab">
                                <br>
                                <table id="" class="table datatables table-striped table-bordered">
                                    <thead>
                                        <tr>
                                            <th>Nombre completo</th>
                                            <th>Tareas asignadas</th>
                                            <th>Acciones</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @foreach ($Lista_personal as $Personal)
                                        <tr>
                                            <td>{{ $Personal->NombrePersonal }} {{ $Personal->ApellidoPersonal }}</td>
                                            <td>{{ sizeof($Personal->tareasDesarrolladasProyecto($proyecto->id)) }}</td>
                                            <td><button class="btn" data-toggle="modal" data-target="#PruebaModal{{$Personal->id}}" type="button">Tareas</button></td>
                                        </tr>
                                        @endforeach
                                    </tbody>
                                </table>
                            </div>
                            <div class="tab-pane active" id="tareas" role="tabpanel" aria-labelledby="tareas-tab">
                                {{-- Inicio de DataTable de tareas del proyecto --}}
                                <br>
                                <table id="TareasDelProyecto" class="table table-striped table-bordered">
                                    <thead>
                                        <tr>
                                            <th>Nombre</th>
                                            {{--<th>Prioridad</th>--}}
                                            <th>Estado</th>
                                            <th>Fecha límite de finalización</th>
                                            <th>Acciones</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @foreach ($tareasDelProyecto as $tarea)
                                        <tr>
                                            <td>{{ $tarea->Nombre_tarea }}</td>
                                             {{--<td>{{ $tarea->prioridad }}</td>--}}
                                             <td>{{ $tarea->estado_tarea->Nombre_estado_tarea }}</td>
                                             @if ($tarea->atrasada())
                                                <td class="danger">{{ $tarea->getFechaLimite() }}</td>
                                             @else
                                                <td class="">{{ $tarea->getFechaLimite() }}</td>
                                             @endif


                                            <td>{!! Form::open(['route' => ['tareas.destroy', $tarea->id], 'method' => 'delete']) !!}
                                                <div class='btn-group'>
                                                    <a href="{{ route('tareas.show', $tarea->id) }}" class='btn btn-default btn-xs'>
                                                        <i class="glyphicon glyphicon-eye-open"></i>
                                                    </a>
                                                    {{--<a href="{{ route('tareas.edit', $tarea->id) }}" class='btn btn-default btn-xs'>
                                                        <i class="glyphicon glyphicon-edit"></i>
                                                    </a>--}}
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
                                <div class="text-center">
                                    <a class="btn btn-danger" href="/proyectos/{{$proyecto->id}}/tareas/create">Añadir tarea</a>
                                </div>
                            </div>
                            <div class="tab-pane fade" id="ambientes" role="tabpanel" aria-labelledby="ambientes-tab">

                                {{-- Inicio de DataTable de ambientes del proyecto --}}
                                        <br>
                                            <table class="table datatables table-striped table-bordered">
                                                <thead>
                                                    <tr>
                                                        <th>Nombre</th>
                                                        <th>Cantidad</th>
                                                        <th>Acciones</th>
                                                    </tr>
                                                </thead>
                                                <tbody>
                                                    @foreach ($ambientesDelProyecto as $ambiente)
                                                    <tr>
                                                        <td>{{ $ambiente->ambiente->Nombre_ambiente }}</td>
                                                        <td>{{ $ambiente->Cantidad }}</td>
                                                        <td>{!! Form::open(['route' => ['proyectoAmbientes.destroy', $ambiente->id], 'method' => 'delete']) !!}
                                                            <div class='btn-group'>

                                                                <a href="{{ route('proyectoAmbientes.edit', $ambiente->id) }}" class='btn btn-default btn-xs'>
                                                                    <i class="glyphicon glyphicon-edit"></i>
                                                                </a>

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
                                            <div class="text-center">
                                                <button class="btn btn-danger" data-toggle="modal" data-target="#ModalCargarAmbiente" type="button">Cargar ambientes</button>

                                </div>

                                {{----------------------- Modal para cargar ambientes -----------------}}

                                <div id="ModalCargarAmbiente" class="modal" tabindex="-1" role="dialog">
                                    <div class="modal-dialog" role="document">
                                      <div class="modal-content">
                                        <div class="modal-header">
                                          <h5 class="modal-title">Modal title
                                          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                            <span aria-hidden="true">&times;</span>
                                          </button></h5>
                                        </div>

                                            @section('css')
                                                @include('layouts.datatables_css')
                                            @endsection

                                            {!! Form::open(['url' => "proyectos/$proyecto->id/proyectoAmbientes"]) !!}

                                                @include('proyecto_ambientes.fields')

                                                <div class="form-group col-sm-12">
                                                    <a href="#" class="addRow btn btn-danger ">Agregar a lista</a>
                                                </div>

                                                <div class="form-group col-sm-12">
                                                    <h2>Cola de carga</h2>
                                                </div>

                                                <div class="col-md-12">
                                                    <table class="table table-striped table-bordered">
                                                        <thead>
                                                            <th>Ambiente</th>
                                                            <th>Cantidad</th>
                                                            <th width="125px">Accion</th>
                                                        </thead>

                                                        <tbody class="ColaCarga">

                                                        </tbody>
                                                    </table>
                                                </div>

                                                <!-- Submit Field -->
                                                <div class="form-group col-sm-12">
                                                </div>

                                        <div class="modal-footer">

                                          {!! Form::submit('Listo', ['class' => 'btn btn-danger']) !!}
                                            <a href="javascript:history.back()" data-dismiss="modal" class="btn btn-default">Cancelar</a>
                                          {!! Form::close() !!}
                                        </div>
                                      </div>
                                    </div>
                                </div>
                                {{----------------------- fin Modal para cargar ambientes -----------------}}
                            </div>
                            <div class="tab-pane fade" id="finalizar" role="tabpanel" aria-labelledby="finalizar-tab">

                                <div class="content">

                                <br>

                                {!! Form::label('Cantidad_tareas', 'Cantidad de tareas del proyecto: ') !!}
                                {{ sizeof($proyecto->tarea) }} <br>

                                {!! Form::label('Cantidad_tareas', 'Cantidad de tareas finalizadas: ') !!}
                                {{ sizeof($proyecto->tareas_finalizadas()) }} <br>

                                @if (($proyecto->Estado_proyecto == "En desarrollo") and (sizeof($proyecto->tarea) == sizeof($proyecto->tareas_finalizadas())))

                                    <br>

                                    <a class="btn btn-danger" href="/proyectos/{{$proyecto->id}}/finalizar">Finalizar proyecto</a>
                                @else

                                    {!! Form::label('Tareas_por_finalizar', 'Tareas por finalizar: ') !!}

                                    <br>
                                    <br>
                                    <table class="table table-striped table-bordered">
                                        <thead>
                                            <tr>
                                                <th>Nombre</th>
                                                <th>Prioridad</th>
                                                <th>Estado</th>
                                                <th>Fecha límite de finalización</th>
                                                <th>Acciones</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            @foreach ($proyecto->tareas_no_finalizadas() as $tarea)
                                            <tr>
                                                <td>{{ $tarea->Nombre_tarea }}</td>
                                                <td>{{ $tarea->prioridad }}</td>
                                                <td>{{ $tarea->estado_tarea->Nombre_estado_tarea }}</td>
                                                <td>{{ $tarea->getFechaLimite() }}</td>
                                                <td>
                                                    <div class='btn-group'>
                                                        <a href="{{ route('tareas.show', $tarea->id) }}" class='btn btn-default btn-xs'>
                                                            <i class="glyphicon glyphicon-eye-open"></i>
                                                        </a>
                                                    </div>
                                                </td>
                                            </tr>
                                            @endforeach
                                        </tbody>
                                    </table>

                                @endif

                                </div>

                            </div>
                        </div>
                        <br>
                        <hr>
                        <a href="{{ route('proyectos.index') }}" class="btn btn-danger pull-right" style="margin-top: -10px;margin-bottom: 5px ">Volver</a>
                    </div>
                </div>
            </div>
        </div>
    </div>
    </div>
</div>

{{-- Modals de tareas de cada empleado --}}

    @foreach ($Lista_personal as $Personal)
    <div id="PruebaModal{{$Personal->id}}" class="modal" tabindex="-1" role="dialog">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header" style="background-color: rgb(223, 43, 61)">
                    <h5 class="modal-title"> <b style="color: white"> Datos personales </b>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                    </button></h5>
                </div>
                <div class="modal-body">
                    <table  id="Personal" class="datatables table  table-bordered">
                        <thead>
                            <tr>
                                <th>Nombre</th>
                                <th>Rol</th>
                                <th>Proyecto</th>
                                {{--  <th>Acciones</th>  --}}
                            </tr>
                        </thead>
                        <tbody>
                            @foreach (($Personal->tareasDesarrolladasProyecto($proyecto->id)) as $asignacion)
                                    <tr>
                                    <td>{{ $asignacion->tarea->Nombre_tarea }}</td>
                                    <td>{{ $asignacion->Responsabilidad }}</td>
                                    <td>{{ $asignacion->tarea->proyecto->Nombre_proyecto }}</td>
                                    {{-- <td>
                                        <a href="{{ route('tareas.show', $asignacion->Tarea_id) }}" class='btn btn-default btn-xs'>
                                            <i class="glyphicon glyphicon-eye-open"></i>
                                        </a>
                                    </td> --}}
                                    </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-danger" data-dismiss="modal">Cerrar</button>
                </div>
            </div>
        </div>
    </div>
    @endforeach

{{-- Fin Modals de tareas de cada empleado --}}


    @section('scripts')

        @include('layouts.datatables_js')

        <script>
                var etiquetas=[];
                var valor=[];
                $(document).ready(function() {

                var etiquetas = <?php echo json_encode($etiquetasGraf) ?> ;
                var valor = <?php echo json_encode($cantidadesGraf) ?> ;

                generarGrafica();
                function generarGrafica(){
                    var ctx = document.getElementById('estado_proyecto').getContext('2d');
                var myChart = new Chart(ctx, {
                    type: 'doughnut',
                    data: {
                        labels: etiquetas,
                        datasets: [{
                            label: 'Tipos de tareas',
                            data: valor,
                            backgroundColor: [
                                'rgba(255, 0, 0, 1)',
                                'rgba(255, 0, 0, 0.1)',
                            ],
                            borderColor: [
                                'rgba(0, 0, 0, 0.5)',
                                'rgba(0, 0, 0, 0.0)',
                            ],
                            borderWidth: 2,
                        }]
                    },

                });
                }
            });

        </script>
    @endsection

@endsection


