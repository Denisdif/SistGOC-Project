<!-- Archivo Field -->
<div class="form-group">
    {!! Form::label('Archivo', 'Archivo:') !!}
    <p>{{ $entrega->Archivo }}</p>
</div>

<!-- Descripcion Entrega Field -->
<div class="form-group">
    {!! Form::label('Descripcion_entrega', 'Descripcion Entrega:') !!}
    <p>{{ $entrega->Descripcion_entrega }}</p>
</div>

<!-- Tarea Id Field -->
<div class="form-group">
    {!! Form::label('Tarea_id', 'Tarea Id:') !!}
    <p>{{ $entrega->Tarea_id }}</p>
</div>

<!-- Created At Field -->
<div class="form-group">
    {!! Form::label('created_at', 'Created At:') !!}
    <p>{{ $entrega->created_at }}</p>
</div>

<!-- Updated At Field -->
<div class="form-group">
    {!! Form::label('updated_at', 'Updated At:') !!}
    <p>{{ $entrega->updated_at }}</p>
</div>

