<!-- Nombre Proyecto Field -->
<div class="form-group">
    {!! Form::label('Nombre_proyecto', 'Nombre Proyecto:') !!}
    <p>{{ $proyecto->Nombre_proyecto }}</p>
</div>

<!-- Tipo Field -->
<div class="form-group">
    {!! Form::label('Tipo', 'Tipo:') !!}
    <p>{{ $proyecto->Tipo }}</p>
</div>

<!-- Fecha Inicio Field -->
<div class="form-group">
    {!! Form::label('Fecha_inicio', 'Fecha Inicio:') !!}
    <p>{{ $proyecto->Fecha_inicio }}</p>
</div>

<!-- Fecha Fin Field -->
<div class="form-group">
    {!! Form::label('Fecha_fin', 'Fecha Fin:') !!}
    <p>{{ $proyecto->Fecha_fin }}</p>
</div>

<!-- Descripcion Field -->
<div class="form-group">
    {!! Form::label('Descripcion', 'Descripcion:') !!}
    <p>{{ $proyecto->Descripcion }}</p>
</div>

<!-- Created At Field -->
<div class="form-group">
    {!! Form::label('created_at', 'Created At:') !!}
    <p>{{ $proyecto->created_at }}</p>
</div>

<!-- Updated At Field -->
<div class="form-group">
    {!! Form::label('updated_at', 'Updated At:') !!}
    <p>{{ $proyecto->updated_at }}</p>
</div>

