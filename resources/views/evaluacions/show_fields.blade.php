

<div class="row">
    <div class="col-sm-6" >
        <div class="">
            <div class="">
                <div class="content">
                    <h2>Datos</h2>
                    <hr>
                    <div style="padding-left: 3%">
                        {!! Form::label('Evaluador_id', 'Evaluador:') !!}
                        {{ $evaluacion->evaluador->NombrePersonal }} {{ $evaluacion->evaluador->ApellidoPersonal }} <br>

                        {!! Form::label('Evaluador_id', 'Evaluado:') !!}
                        {{ $evaluacion->personal->NombrePersonal }} {{ $evaluacion->personal->ApellidoPersonal }} <br>

                        {!! Form::label('Fecha_inicio', 'Fecha de inicio:') !!}
                        {{ $evaluacion->getFechaInicio() }}<br>

                        {!! Form::label('Fecha_fin', 'Fecha de fin:') !!}
                        {{ $evaluacion->getFechaFin() }}<br>

                        {!! Form::label('created_at', 'Fecha de creación:') !!}
                        {{ $evaluacion->getFechaCreacion() }}

                    </div>
                    <h2>Calificaciones</h2>
                    <hr>
                    <div style="padding-left: 3%">
                        @foreach ($tipos_de_tareas as $item)

                            @if (sizeof($personal->get_tareas_desarrolladas_por_fecha($item->Nombre_tipo_tarea,$evaluacion->Fecha_inicio, $evaluacion->Fecha_fin)))
                                {!! Form::label($item->Nombre_tipo_tarea, $item->Nombre_tipo_tarea) !!}: {{ round(($personal->get_rendimiento($personal->
                                    get_tareas_desarrolladas_por_fecha($item->Nombre_tipo_tarea,$evaluacion->Fecha_inicio, $evaluacion->Fecha_fin))),2) }} <br>
                            @endif
                        @endforeach

                    </div>
                </div>
            </div>
        </div>
    </div>

    <div class="col-sm-6" >
        <br><br>
        <div class="box box-danger">
            <div class="box-body">
                <canvas id="rendimiento" width="40" height="27"></canvas>
            </div>
            <br>
        </div>
    </div>

</div>

<div class="row">
    <div class="col-sm-12" >
        <div class="box box-danger">
            <div class="box-body">
                <div class="content">

                    <h2>Tareas</h2>
                    <table class="table table-bordered">
                        <thead>
                            <tr class="bg-danger" style="background-color:rgb(0, 0, 0)">
                                <th class="text-center" style="color: aliceblue">Tarea</th>
                                <th class="text-center" style="color: aliceblue">Codigo de proyecto</th>
                                <th class="text-center" style="color: aliceblue">Correcciones</th>
                                <th class="text-center" style="color: aliceblue">Fecha de inicio</th>
                                <th class="text-center" style="color: aliceblue">Fecha de finalización</th>
                                {{--<th class="text-center" >Tarea</th>
                                <th class="text-center" >Codigo de proyecto</th>
                                <th class="text-center" >Correcciones</th>
                                <th class="text-center" >Fecha de inicio</th>
                                <th class="text-center" >Fecha de finalización</th>--}}
                            </tr>
                            @foreach ($tipos_de_tareas as $item)
                                @if (($evaluacion->personal->get_tareas_desarrolladas_por_fecha($item->Nombre_tipo_tarea, $evaluacion->Fecha_inicio, $evaluacion->Fecha_fin)))
                                    <tr class="active">
                                        <th colspan="5" >  {{ $item->Nombre_tipo_tarea }} </th>
                                    </tr>
                                    @if (($evaluacion->personal->get_tareas_desarrolladas_por_fecha($item->Nombre_tipo_tarea, $evaluacion->Fecha_inicio, $evaluacion->Fecha_fin)) == null)
                                        <tr>
                                            <td colspan="5" class="text-center" style="padding-right: 5%">  No ha desarrollado tareas de este tipo </td>
                                        </tr>
                                    @endif
                                </thead>
                                <tbody>
                                    @foreach ($evaluacion->personal->get_tareas_desarrolladas_por_fecha($item->Nombre_tipo_tarea, $evaluacion->Fecha_inicio, $evaluacion->Fecha_fin) as $tarea)
                                    <tr>
                                        <td style="padding-left: 25px">{{ $tarea->Nombre_tarea }}</td>
                                        <td class="text-center">{{ $tarea->Proyecto_id }}</td>
                                        @if ($tarea->Correcciones=="true")
                                            <td class="text-center">Si</td>
                                        @else
                                            <td class="text-center">No</td>
                                        @endif
                                        <td class="text-center">{{ $tarea->getFechaInicio() }}</td>
                                        <td class="text-center">{{ $tarea->getFechaFin() }}</td>
                                    </tr>
                                    @endforeach
                                @endif
                            @endforeach
                        </tbody>
                    </table>

                </div>
            </div>
        </div>
    </div>
</div>

{{--
<div class="form-group">

    <div class="row content">
        <div class="col-sm-6" >
            <h2>Datos</h2>
            <br> <br>
            <div style="padding-left: 3%">
                {!! Form::label('Evaluador_id', 'Evaluador:') !!}
                {{ $evaluacion->evaluador->NombrePersonal }} {{ $evaluacion->evaluador->ApellidoPersonal }} <br>

                {!! Form::label('Evaluador_id', 'Evaluado:') !!}
                {{ $evaluacion->personal->NombrePersonal }} {{ $evaluacion->personal->ApellidoPersonal }} <br>

                {!! Form::label('Fecha_inicio', 'Fecha de inicio:') !!}
                {{ $evaluacion->getFechaInicio() }}<br>

                {!! Form::label('Fecha_fin', 'Fecha de fin:') !!}
                {{ $evaluacion->getFechaFin() }}<br>

                {!! Form::label('created_at', 'Fecha de creación:') !!}
                {{ $evaluacion->getFechaCreacion() }}
            </div>
        </div>
        <div class=" col-sm-6" >
            <canvas id="rendimiento" width="40" height="20"></canvas>
        </div>
    </div>
    <hr>

    <div class="content">

        <h2>Tareas</h2>
        <table class="table table-bordered">
            <thead>
                <tr class="bg-danger" style="background-color:rgb(0, 0, 0)">
                    <th class="text-center" style="color: aliceblue">Tarea</th>
                    <th class="text-center" style="color: aliceblue">Codigo de proyecto</th>
                    <th class="text-center" style="color: aliceblue">Correcciones</th>
                    <th class="text-center" style="color: aliceblue">Fecha de inicio</th>
                    <th class="text-center" style="color: aliceblue">Fecha de finalización</th>
                </tr>
                @foreach ($tipos_de_tareas as $item)
                    @if (($evaluacion->personal->get_tareas_desarrolladas_por_fecha($item->Nombre_tipo_tarea, $evaluacion->Fecha_inicio, $evaluacion->Fecha_fin)))
                        <tr class="active">
                            <th colspan="5" >  {{ $item->Nombre_tipo_tarea }} </th>
                        </tr>
                        @if (($evaluacion->personal->get_tareas_desarrolladas_por_fecha($item->Nombre_tipo_tarea, $evaluacion->Fecha_inicio, $evaluacion->Fecha_fin)) == null)
                            <tr>
                                <td colspan="5" class="text-center" style="padding-right: 5%">  No ha desarrollado tareas de este tipo </td>
                            </tr>
                        @endif
                    </thead>
                    <tbody>
                        @foreach ($evaluacion->personal->get_tareas_desarrolladas_por_fecha($item->Nombre_tipo_tarea, $evaluacion->Fecha_inicio, $evaluacion->Fecha_fin) as $tarea)
                        <tr>
                            <td style="padding-left: 25px">{{ $tarea->Nombre_tarea }}</td>
                            <td class="text-center">{{ $tarea->Proyecto_id }}</td>
                            @if ($tarea->Correcciones=="true")
                                <td class="text-center">Si</td>
                            @else
                                <td class="text-center">No</td>
                            @endif
                            <td class="text-center">{{ $tarea->getFechaInicio() }}</td>
                            <td class="text-center">{{ $tarea->getFechaFin() }}</td>
                        </tr>
                        @endforeach
                    @endif
                @endforeach
            </tbody>
        </table>

    </div>
</div> --}}
