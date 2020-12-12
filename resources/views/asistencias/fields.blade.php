<!-- User Id Field -->
<div class="form-group col-sm-6">
    {!! Form::label('User_id', 'User Id:') !!}
    {!! Form::number('User_id', null, ['class' => 'form-control']) !!}
</div>

<!-- Entrada Field -->
<div class="form-group col-sm-6">
    {!! Form::label('Entrada', 'Entrada:') !!}
    {!! Form::text('Entrada', null, ['class' => 'form-control']) !!}
</div>

<!-- Salida Field -->
<div class="form-group col-sm-6">
    {!! Form::label('Salida', 'Salida:') !!}
    {!! Form::text('Salida', null, ['class' => 'form-control']) !!}
</div>

<!-- Submit Field -->
<div class="form-group col-sm-12">
    {!! Form::submit('Save', ['class' => 'btn btn-primary']) !!}
    <a href="{{ route('asistencias.index') }}" class="btn btn-default">Cancel</a>
</div>
