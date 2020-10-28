<!-- Nombre Sexo Field -->
<div class="form-group col-sm-6">
    {!! Form::label('Nombre_sexo', 'Nombre Sexo:') !!}
    {!! Form::text('Nombre_sexo', null, ['class' => 'form-control']) !!}
</div>

<!-- Submit Field -->
<div class="form-group col-sm-12">
    {!! Form::submit('Guardar', ['class' => 'btn btn-danger']) !!}
    <a href="javascript:history.back()" class="btn btn-default">Cancelar</a>
</div>
