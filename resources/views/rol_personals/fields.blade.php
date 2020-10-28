<!-- Nombrerol Field -->
<div class="form-group col-sm-6">
    {!! Form::label('NombreRol', 'Nombre de rol:') !!}
    {!! Form::text('NombreRol', null, ['class' => 'form-control']) !!}
</div>

<!-- Descripcion Field -->
<div class="form-group col-sm-12 col-lg-12">
    {!! Form::label('Descripcion', 'Descripcion:') !!}
    {!! Form::textarea('Descripcion', null, ['class' => 'form-control']) !!}
</div>

<!-- Submit Field -->
<div class="form-group col-sm-12">
    {!! Form::submit('Guardar', ['class' => 'btn btn-danger']) !!}
    <a href="javascript:history.back()" class="btn btn-default">Cancelar</a>
</div>
