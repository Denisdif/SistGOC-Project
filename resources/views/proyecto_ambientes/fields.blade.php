<!-- Ambiente Id Field -->
<div class="form-group col-sm-6">
    {!! Form::label('Ambiente_id', 'Ambiente Id:') !!}
    {!! Form::select('Ambiente_id', $ambienteItems, null, ['class' => 'form-control']) !!}
</div>

<!-- Cantidad Field -->
<div class="form-group col-sm-6">
    {!! Form::label('Cantidad', 'Cantidad:') !!}
    {!! Form::number('Cantidad', null, ['class' => 'form-control']) !!}
</div>

<!-- Proyecto Id Field
<div class="form-group col-sm-6">
    {!! Form::label('Proyecto_id', 'Proyecto Id:') !!}
    {!! Form::select('Proyecto_id', $proyectoItems, null, ['class' => 'form-control']) !!}
</div> -->

<!-- Submit Field -->
<div class="form-group col-sm-12">
    {!! Form::submit('Save', ['class' => 'btn btn-danger']) !!}
    <a href="{{ route('proyectos.show', $proyecto->id) }}" class="btn btn-default">Cancel</a>
</div>
