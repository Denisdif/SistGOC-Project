
<div class="form-group">

    <h2>Datos:</h2><br>

    {!! Form::label('Evaluador_id', 'Evaluador:') !!}
    {{ $evaluacion->evaluador->NombrePersonal }} {{ $evaluacion->evaluador->ApellidoPersonal }} <br>

    {!! Form::label('Evaluador_id', 'Evaluado:') !!}
    {{ $evaluacion->personal->NombrePersonal }} {{ $evaluacion->personal->ApellidoPersonal }} <br>

    {!! Form::label('Fecha_inicio', 'Fecha de inicio:') !!}
    {{ $evaluacion->Fecha_inicio }}<br>

    {!! Form::label('Fecha_fin', 'Fecha de fin:') !!}
    {{ $evaluacion->Fecha_fin }}<br>

    {!! Form::label('created_at', 'Fecha de creación:') !!}
    {{ $evaluacion->created_at }}<br>

</div>

<hr>

<div class="form-group">

    <h2>Tareas:</h2><br>

    <b>Rendimiento: </b>{{ $evaluacion->personal->get_rendimiento($evaluacion->personal->tareas_desarrolladas_por_fecha($evaluacion->Fecha_inicio, $evaluacion->Fecha_fin)) }} <br><br>

    @foreach ($tipos_de_tareas as $item)
        <b>{{ $item->Nombre_tipo_tarea }}: {{ $evaluacion->personal->get_rendimiento($evaluacion->personal->get_tareas_desarrolladas_por_fecha($item->Nombre_tipo_tarea, $evaluacion->Fecha_inicio, $evaluacion->Fecha_fin)) }}</b> <br><br>
        @foreach ($evaluacion->personal->get_tareas_desarrolladas_por_fecha($item->Nombre_tipo_tarea, $evaluacion->Fecha_inicio, $evaluacion->Fecha_fin) as $tarea)
            {{ $tarea->Nombre_tarea }} {{ $tarea->calificacion() }} <br>
        @endforeach
        <br>
    @endforeach
</div>

