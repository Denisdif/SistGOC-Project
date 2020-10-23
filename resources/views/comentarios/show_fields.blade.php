<!-- Contenido Field -->
<div class="form-group">
    {!! Form::label('Contenido', 'Contenido:') !!}
    <p>{{ $comentario->Contenido }}</p>
</div>

<!-- Tarea Id Field -->
<div class="form-group">
    {!! Form::label('Tarea_id', 'Tarea Id:') !!}
    <p>{{ $comentario->Tarea_id }}</p>
</div>

<!-- Created At Field -->
<div class="form-group">
    {!! Form::label('created_at', 'Created At:') !!}
    <p>{{ $comentario->created_at }}</p>
</div>

<!-- Updated At Field -->
<div class="form-group">
    {!! Form::label('updated_at', 'Updated At:') !!}
    <p>{{ $comentario->updated_at }}</p>
</div>

