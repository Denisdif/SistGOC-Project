<!-- Nombre Ambiente Field -->
<div class="form-group col-sm-6">
    {!! Form::label('Nombre_ambiente', 'Nombre Ambiente:') !!}
    {!! Form::text('Nombre_ambiente', null, ['class' => 'form-control']) !!}
</div>

<!-- Imagen Field -->
<div class="form-group col-sm-6">
    {!! Form::label('Imagen', 'Imagen:') !!}
    {!! Form::file('Imagen') !!}
</div>
<div class="clearfix"></div>

<!-- Descripcion Field -->
<div class="form-group col-sm-12 col-lg-12">
    {!! Form::label('Descripcion', 'Descripcion:') !!}
    {!! Form::textarea('Descripcion', null, ['class' => 'form-control']) !!}
</div>

<!-- Submit Field -->
<div class="form-group col-sm-12">
    {!! Form::submit('Save', ['class' => 'btn btn-danger']) !!}
    <a href="{{ route('ambientes.index') }}" class="btn btn-default">Cancel</a>
</div>
