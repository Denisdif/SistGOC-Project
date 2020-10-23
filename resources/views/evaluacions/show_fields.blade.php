<!-- Evaluador Id Field -->
<div class="form-group">
    {!! Form::label('Evaluador_id', 'Evaluador Id:') !!}
    <p>{{ $evaluacion->Evaluador_id }}</p>
</div>

<!-- Personal Id Field -->
<div class="form-group">
    {!! Form::label('Personal_id', 'Personal Id:') !!}
    <p>{{ $evaluacion->Personal_id }}</p>
</div>

<!-- Fecha Inicio Field -->
<div class="form-group">
    {!! Form::label('Fecha_inicio', 'Fecha Inicio:') !!}
    <p>{{ $evaluacion->Fecha_inicio }}</p>
</div>

<!-- Fecha Fin Field -->
<div class="form-group">
    {!! Form::label('Fecha_fin', 'Fecha Fin:') !!}
    <p>{{ $evaluacion->Fecha_fin }}</p>
</div>

<!-- Created At Field -->
<div class="form-group">
    {!! Form::label('created_at', 'Created At:') !!}
    <p>{{ $evaluacion->created_at }}</p>
</div>

<!-- Updated At Field -->
<div class="form-group">
    {!! Form::label('updated_at', 'Updated At:') !!}
    <p>{{ $evaluacion->updated_at }}</p>
</div>

