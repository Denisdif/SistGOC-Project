<!-- Nombre Field -->
<div class="form-group col-sm-6">
    {!! Form::label('Nombre', 'Nombre:') !!}
    {!! Form::text('Nombre', null, ['class' => 'form-control']) !!}
</div>

<!-- Descripcion Tipo Field -->
<div class="form-group col-sm-12 col-lg-12">
    {!! Form::label('Descripcion_tipo', 'Descripcion Tipo:') !!}
    {!! Form::textarea('Descripcion_tipo', null, ['class' => 'form-control']) !!}
</div>

<!-- Submit Field -->
<div class="form-group col-sm-12">
    {!! Form::submit('Save', ['class' => 'btn btn-primary']) !!}
    <a href="{{ route('tipoProyectos.index') }}" class="btn btn-default">Cancel</a>
</div>
