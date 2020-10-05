<!-- Complejidad Field -->
<div class="form-group col-sm-6">
    {!! Form::label('Complejidad', 'Complejidad:') !!}
    {!! Form::text('Complejidad', null, ['class' => 'form-control']) !!}
</div>

<!-- Ambiente Id Field -->
<div class="form-group col-sm-6">
    {!! Form::label('Ambiente_id', 'Ambiente Id:') !!}
    {!! Form::select('Ambiente_id', $ambienteItems, null, ['class' => 'form-control']) !!}
</div>

<!-- Consideracion Id Field -->
<div class="form-group col-sm-6">
    {!! Form::label('Consideracion_id', 'Consideracion Id:') !!}
    {!! Form::select('Consideracion_id', $consideracionItems, null, ['class' => 'form-control']) !!}
</div>

<!-- Submit Field -->
<div class="form-group col-sm-12">
    {!! Form::submit('Save', ['class' => 'btn btn-primary']) !!}
    <a href="{{ route('consideracionAmbientes.index') }}" class="btn btn-default">Cancel</a>
</div>
