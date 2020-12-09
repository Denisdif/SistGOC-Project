<div class="col-md-12 mb-12">

    {!! Form::label('Nombre_tarea', 'Nombre de la Tarea:') !!}
    {{ $tarea->Nombre_tarea }} <br>

    {!! Form::label('Proridad', 'Prioridad:') !!}
    {{ $tarea->prioridad }} <br>

    {!! Form::label('Tipo_tarea', 'Tipo de tarea:') !!}
    {{ $tarea->tipo_tarea->Nombre_tipo_tarea }} <br>

    {!! Form::label('Estado_tarea', 'Estado de tarea:') !!}
    {{ $tarea->estado_tarea->Nombre_estado_tarea }} <br>

    {!! Form::label('Fecha_inicio', 'Fecha de inicio:') !!}
    {{ $tarea->getFechaInicio() }} <br>

    {!! Form::label('Fecha_fin', 'Fecha de finalización:') !!}
    {{ $tarea->getFechaFin() }} <br>

    {!! Form::label('Estimacion', 'Tiempo de desarrollo estimado:') !!}
    {{ $tarea->duracionEstimadaReal($tarea->Tipo_tarea_id)}} <br>

    {!! Form::label('Descripcion', 'Descripción:') !!}
    {{ $tarea->Descripcion_tarea }} <br>

</div>


<!-- Nombre Tarea Field
<div class="col-md-4 mb-3">
    {!! Form::label('Nombre_tarea', 'Nombre Tarea:') !!}
    <p>{{ $tarea->Nombre_tarea }}</p>
</div> -->

<!-- Fecha Inicio Field
<div class="col-md-4 mb-3">
    {!! Form::label('Fecha_inicio', 'Fecha Inicio:') !!}
    <p>{{ $tarea->Fecha_inicio }}</p>
</div> -->

<!-- Fecha Fin Field
<div class="col-md-4 mb-3">
    {!! Form::label('Fecha_fin', 'Fecha Fin:') !!}
    <p>{{ $tarea->Fecha_fin }}</p>
</div>  -->

<!-- Valor Field
<div class="col-md-4 mb-3">
    {!! Form::label('Valor', 'Valor:') !!}
    <p>{{ $tarea->Valor }}</p>
</div> -->

<!-- Correcciones Field
<div class="col-md-4 mb-3">
    {!! Form::label('Correcciones', 'Correcciones:') !!}
    <p>{{ $tarea->Correcciones }}</p>
</div> -->

<!-- Descripcion Tarea Field
<div class="col-md-4 mb-3">
    {!! Form::label('Descripcion_tarea', 'Descripcion Tarea:') !!}
    <p>{{ $tarea->Descripcion_tarea }}</p>
</div> -->

<!-- Proyecto Id Field
<div class="col-md-4 mb-3">
    {!! Form::label('Proyecto_id', 'Proyecto Id:') !!}
    <p>{{ $tarea->Proyecto_id }}</p>
</div> -->

<!-- Tipo Tarea Id Field
<div class="col-md-4 mb-3">
    {!! Form::label('Tipo_tarea_id', 'Tipo Tarea Id:') !!}
    <p>{{ $tarea->Tipo_tarea_id }}</p>
</div> -->

<!-- Estado Tarea Id Field
<div class="col-md-4 mb-3">
    {!! Form::label('Estado_tarea_id', 'Estado Tarea Id:') !!}
    <p>{{ $tarea->Estado_tarea_id }}</p>
</div> -->

<!-- Created At Field
<div class="col-md-4 mb-3">
    {!! Form::label('created_at', 'Created At:') !!}
    <p>{{ $tarea->created_at }}</p>
</div> -->

<!-- Updated At Field
<div class="col-md-4 mb-3">
    {!! Form::label('updated_at', 'Updated At:') !!}
    <p>{{ $tarea->updated_at }}</p>
</div> -->

