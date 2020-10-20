<!-- Calle Field -->
<div class="form-group col-sm-6">
    {!! Form::label('Calle', 'Calle:') !!}
    {!! Form::text('Calle', null, ['class' => 'form-control']) !!}
</div>

<!-- Altura Field -->
<div class="form-group col-sm-6">
    {!! Form::label('Altura', 'Altura:') !!}
    {!! Form::number('Altura', null, ['class' => 'form-control']) !!}
</div>

<!-- Pais Id Field -->
<div class="form-group col-sm-6">
    {!! Form::label('Pais_id', 'Pais Id:') !!}
    {!! Form::select('Pais_id', $paiseItems, null, ['class' => 'form-control']) !!}
</div>

<!-- Provincia Id Field -->
<div class="form-group col-sm-6">
    {!! Form::label('Provincia_id', 'Provincia Id:') !!}
    {!! Form::select('Provincia_id', $provinciaItems, null, ['class' => 'form-control']) !!}
</div>

<!-- Localidad Id Field -->
<div class="form-group col-sm-6">
    {!! Form::label('Localidad_id', 'Localidad Id:') !!}
    {!! Form::select('Localidad_id', $localidadeItems, null, ['class' => 'form-control']) !!}
</div>

<!-- Submit Field -->
<div class="form-group col-sm-12">
    {!! Form::submit('Save', ['class' => 'btn btn-primary']) !!}
    <a href="{{ route('direccions.index') }}" class="btn btn-default">Cancel</a>
</div>
