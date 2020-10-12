<!-- Nombre Tipo Tarea Field -->
<div class="form-group">
    {!! Form::label('Nombre_tipo_tarea', 'Nombre Tipo Tarea:') !!}
    <p>{{ $tipoTarea->Nombre_tipo_tarea }}</p>
</div>

<!-- Descripcion Field -->
<div class="form-group">
    {!! Form::label('Descripcion', 'Descripcion:') !!}
    <p>{{ $tipoTarea->Descripcion }}</p>
</div>

<!-- Created At Field -->
<div class="form-group">
    {!! Form::label('created_at', 'Created At:') !!}
    <p>{{ $tipoTarea->created_at }}</p>
</div>

<!-- Updated At Field -->
<div class="form-group">
    {!! Form::label('updated_at', 'Updated At:') !!}
    <p>{{ $tipoTarea->updated_at }}</p>
</div>

