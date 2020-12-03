<div class="form-group">

    <div class="content">
        <h2>Datos</h2>
        <hr>
        {!! Form::label('Evaluador_id', 'Evaluador:') !!}
        {{ $evaluacion->evaluador->NombrePersonal }} {{ $evaluacion->evaluador->ApellidoPersonal }} <br>

        {!! Form::label('Evaluador_id', 'Evaluado:') !!}
        {{ $evaluacion->personal->NombrePersonal }} {{ $evaluacion->personal->ApellidoPersonal }} <br>

        {!! Form::label('Fecha_inicio', 'Fecha de inicio:') !!}
        {{ $evaluacion->Fecha_inicio }}<br>

        {!! Form::label('Fecha_fin', 'Fecha de fin:') !!}
        {{ $evaluacion->Fecha_fin }}<br>

        {!! Form::label('created_at', 'Fecha de creación:') !!}
        {{ $evaluacion->created_at }}
        <hr>
    </div>

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
                @endforeach
            </tbody>
        </table>

    </div>
</div>


    {{-- <h2>Tareas:</h2><br>

    <b>Rendimiento: </b>{{ $evaluacion->personal->get_rendimiento($evaluacion->personal->tareas_desarrolladas_por_fecha($evaluacion->Fecha_inicio, $evaluacion->Fecha_fin)) }} <br><br>

    @foreach ($tipos_de_tareas as $item)
        <b>{{ $item->Nombre_tipo_tarea }}: {{ $evaluacion->personal->get_rendimiento($evaluacion->personal->get_tareas_desarrolladas_por_fecha($item->Nombre_tipo_tarea, $evaluacion->Fecha_inicio, $evaluacion->Fecha_fin)) }}</b> <br><br>
        @foreach ($evaluacion->personal->get_tareas_desarrolladas_por_fecha($item->Nombre_tipo_tarea, $evaluacion->Fecha_inicio, $evaluacion->Fecha_fin) as $tarea)
            {{ $tarea->Nombre_tarea }} {{ $tarea->calificacion() }} <br>
        @endforeach
        <br>
    @endforeach --}}
