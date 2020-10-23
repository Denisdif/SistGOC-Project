<!-- Archivo Field -->
<div class="form-group col-sm-6">
    {!! Form::label('Archivo', 'Archivo:') !!}
    {!! Form::file('Archivo') !!}
</div>
<div class="clearfix"></div>

<!-- Descripcion Entrega Field -->
<div class="form-group col-sm-12 col-lg-12">
    {!! Form::label('Descripcion_entrega', 'Descripcion Entrega:') !!}
    {!! Form::textarea('Descripcion_entrega', null, ['class' => 'form-control']) !!}
</div>

<!-- Tarea Id Field -->
<div class="form-group col-sm-6">
    {!! Form::label('Tarea_id', 'Tarea Id:') !!}
    {!! Form::number('Tarea_id', null, ['class' => 'form-control']) !!}
</div>

<!-- Submit Field -->
<div class="form-group col-sm-12">
    {!! Form::submit('Save', ['class' => 'btn btn-primary']) !!}
    <a href="{{ route('entregas.index') }}" class="btn btn-default">Cancel</a>
</div>
