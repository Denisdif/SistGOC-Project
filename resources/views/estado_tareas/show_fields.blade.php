<!-- Nombre Estado Tarea Field -->
<div class="form-group">
    {!! Form::label('Nombre_estado_tarea', 'Nombre Estado Tarea:') !!}
    <p>{{ $estadoTarea->Nombre_estado_tarea }}</p>
</div>

<!-- Descripcion Field -->
<div class="form-group">
    {!! Form::label('Descripcion', 'Descripcion:') !!}
    <p>{{ $estadoTarea->Descripcion }}</p>
</div>

<!-- Created At Field -->
<div class="form-group">
    {!! Form::label('created_at', 'Created At:') !!}
    <p>{{ $estadoTarea->created_at }}</p>
</div>

<!-- Updated At Field -->
<div class="form-group">
    {!! Form::label('updated_at', 'Updated At:') !!}
    <p>{{ $estadoTarea->updated_at }}</p>
</div>

