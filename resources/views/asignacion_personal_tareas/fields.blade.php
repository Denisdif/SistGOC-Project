<!-- Responsabilidad Field -->
<div class="form-group col-sm-6">
    {!! Form::label('Responsabilidad', 'Responsabilidad:') !!}
    {!! Form::text('Responsabilidad', null, ['class' => 'form-control']) !!}
</div>

<!-- Personal Id Field -->
<div class="form-group col-sm-6">
    {!! Form::label('Personal_id', 'Personal Id:') !!}
    {!! Form::select('Personal_id', $personalItems, null, ['class' => 'form-control']) !!}
</div>

<!-- Tarea Id Field -->
<div class="form-group col-sm-6">
    {!! Form::label('Tarea_id', 'Tarea Id:') !!}
    {!! Form::select('Tarea_id', $tareaItems, null, ['class' => 'form-control']) !!}
</div>

<!-- Submit Field -->
<div class="form-group col-sm-12">
    {!! Form::submit('Save', ['class' => 'btn btn-danger']) !!}
    <a href="{{ route('asignacionPersonalTareas.index') }}" class="btn btn-default">Cancel</a>
</div>
