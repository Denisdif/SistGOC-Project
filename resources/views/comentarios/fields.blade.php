<!-- Contenido Field -->
<div class="form-group col-sm-12 col-lg-12">
    {!! Form::label('Contenido', 'Contenido:') !!}
    {!! Form::textarea('Contenido', null, ['class' => 'form-control']) !!}
</div>

<!-- Tarea Id Field -->
<div class="form-group col-sm-6">
    {!! Form::label('Tarea_id', 'Tarea Id:') !!}
    {!! Form::number('Tarea_id', null, ['class' => 'form-control']) !!}
</div>

<!-- Submit Field -->
<div class="form-group col-sm-12">
    {!! Form::submit('Save', ['class' => 'btn btn-primary']) !!}
    <a href="javascript:history.back()" class="btn btn-default">Cancelar</a>
</div>
