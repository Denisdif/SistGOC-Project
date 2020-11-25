<!-- Tarea Id Field -->
<div class="form-group col-sm-6">
    {!! Form::label('Tarea_id', 'Tarea Id:') !!}
    {!! Form::select('Tarea_id', $tareaItems, null, ['class' => 'form-control']) !!}
</div>

<!-- Predecesora Id Field -->
<div class="form-group col-sm-6">
    {!! Form::label('Predecesora_id', 'Predecesora Id:') !!}
    {!! Form::select('Predecesora_id', $tareaItems, null, ['class' => 'form-control']) !!}
</div>

<!-- Submit Field -->
<div class="form-group col-sm-12">
    {!! Form::submit('Save', ['class' => 'btn btn-primary']) !!}
    <a href="{{ route('predecesoras.index') }}" class="btn btn-default">Cancel</a>
</div>
