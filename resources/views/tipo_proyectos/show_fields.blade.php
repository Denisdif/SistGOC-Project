<!-- Nombre Field -->
<div class="form-group">
    {!! Form::label('Nombre', 'Nombre:') !!}
    <p>{{ $tipoProyecto->Nombre }}</p>
</div>

<!-- Descripcion Tipo Field -->
<div class="form-group">
    {!! Form::label('Descripcion_tipo', 'Descripcion Tipo:') !!}
    <p>{{ $tipoProyecto->Descripcion_tipo }}</p>
</div>

<!-- Created At Field -->
<div class="form-group">
    {!! Form::label('created_at', 'Created At:') !!}
    <p>{{ $tipoProyecto->created_at }}</p>
</div>

<!-- Updated At Field -->
<div class="form-group">
    {!! Form::label('updated_at', 'Updated At:') !!}
    <p>{{ $tipoProyecto->updated_at }}</p>
</div>

