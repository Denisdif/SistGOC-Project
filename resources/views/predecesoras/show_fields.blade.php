<!-- Tarea Id Field -->
<div class="form-group">
    {!! Form::label('Tarea_id', 'Tarea Id:') !!}
    <p>{{ $predecesora->Tarea_id }}</p>
</div>

<!-- Predecesora Id Field -->
<div class="form-group">
    {!! Form::label('Predecesora_id', 'Predecesora Id:') !!}
    <p>{{ $predecesora->Predecesora_id }}</p>
</div>

<!-- Created At Field -->
<div class="form-group">
    {!! Form::label('created_at', 'Created At:') !!}
    <p>{{ $predecesora->created_at }}</p>
</div>

<!-- Updated At Field -->
<div class="form-group">
    {!! Form::label('updated_at', 'Updated At:') !!}
    <p>{{ $predecesora->updated_at }}</p>
</div>

