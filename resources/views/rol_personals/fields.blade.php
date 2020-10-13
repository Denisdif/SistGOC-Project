<!-- Nombrerol Field -->
<div class="form-group col-sm-6">
    {!! Form::label('NombreRol', 'Nombrerol:') !!}
    {!! Form::text('NombreRol', null, ['class' => 'form-control']) !!}
</div>

<!-- Descripcion Field -->
<div class="form-group col-sm-12 col-lg-12">
    {!! Form::label('Descripcion', 'Descripcion:') !!}
    {!! Form::textarea('Descripcion', null, ['class' => 'form-control']) !!}
</div>

<!-- Submit Field -->
<div class="form-group col-sm-12">
    {!! Form::submit('Save', ['class' => 'btn btn-primary']) !!}
    <a href="{{ route('rolPersonals.index') }}" class="btn btn-default">Cancel</a>
</div>
