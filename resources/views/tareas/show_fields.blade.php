<!-- Nombre Tarea Field -->
<div class="form-group">
    {!! Form::label('Nombre_tarea', 'Nombre Tarea:') !!}
    <p>{{ $tarea->Nombre_tarea }}</p>
</div>

<!-- Fecha Inicio Field -->
<div class="form-group">
    {!! Form::label('Fecha_inicio', 'Fecha Inicio:') !!}
    <p>{{ $tarea->Fecha_inicio }}</p>
</div>

<!-- Fecha Fin Field -->
<div class="form-group">
    {!! Form::label('Fecha_fin', 'Fecha Fin:') !!}
    <p>{{ $tarea->Fecha_fin }}</p>
</div>

<!-- Valor Field -->
<div class="form-group">
    {!! Form::label('Valor', 'Valor:') !!}
    <p>{{ $tarea->Valor }}</p>
</div>

<!-- Correcciones Field -->
<div class="form-group">
    {!! Form::label('Correcciones', 'Correcciones:') !!}
    <p>{{ $tarea->Correcciones }}</p>
</div>

<!-- Descripcion Tarea Field -->
<div class="form-group">
    {!! Form::label('Descripcion_tarea', 'Descripcion Tarea:') !!}
    <p>{{ $tarea->Descripcion_tarea }}</p>
</div>

<!-- Proyecto Id Field -->
<div class="form-group">
    {!! Form::label('Proyecto_id', 'Proyecto Id:') !!}
    <p>{{ $tarea->Proyecto_id }}</p>
</div>

<!-- Tipo Tarea Id Field -->
<div class="form-group">
    {!! Form::label('Tipo_tarea_id', 'Tipo Tarea Id:') !!}
    <p>{{ $tarea->Tipo_tarea_id }}</p>
</div>

<!-- Estado Tarea Id Field -->
<div class="form-group">
    {!! Form::label('Estado_tarea_id', 'Estado Tarea Id:') !!}
    <p>{{ $tarea->Estado_tarea_id }}</p>
</div>

<!-- Created At Field -->
<div class="form-group">
    {!! Form::label('created_at', 'Created At:') !!}
    <p>{{ $tarea->created_at }}</p>
</div>

<!-- Updated At Field -->
<div class="form-group">
    {!! Form::label('updated_at', 'Updated At:') !!}
    <p>{{ $tarea->updated_at }}</p>
</div>

