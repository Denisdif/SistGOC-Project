<!-- Responsabilidad Field -->
<div class="form-group">
    {!! Form::label('Responsabilidad', 'Responsabilidad:') !!}
    <p>{{ $asignacionPersonalTarea->Responsabilidad }}</p>
</div>

<!-- Personal Id Field -->
<div class="form-group">
    {!! Form::label('Personal_id', 'Personal Id:') !!}
    <p>{{ $asignacionPersonalTarea->Personal_id }}</p>
</div>

<!-- Tarea Id Field -->
<div class="form-group">
    {!! Form::label('Tarea_id', 'Tarea Id:') !!}
    <p>{{ $asignacionPersonalTarea->Tarea_id }}</p>
</div>

<!-- Created At Field -->
<div class="form-group">
    {!! Form::label('created_at', 'Created At:') !!}
    <p>{{ $asignacionPersonalTarea->created_at }}</p>
</div>

<!-- Updated At Field -->
<div class="form-group">
    {!! Form::label('updated_at', 'Updated At:') !!}
    <p>{{ $asignacionPersonalTarea->updated_at }}</p>
</div>

