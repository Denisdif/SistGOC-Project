<!-- User Id Field -->
<div class="form-group">
    {!! Form::label('User_id', 'User Id:') !!}
    <p>{{ $asistencia->User_id }}</p>
</div>

<!-- Entrada Field -->
<div class="form-group">
    {!! Form::label('Entrada', 'Entrada:') !!}
    <p>{{ $asistencia->Entrada }}</p>
</div>

<!-- Salida Field -->
<div class="form-group">
    {!! Form::label('Salida', 'Salida:') !!}
    <p>{{ $asistencia->Salida }}</p>
</div>

<!-- Created At Field -->
<div class="form-group">
    {!! Form::label('created_at', 'Created At:') !!}
    <p>{{ $asistencia->created_at }}</p>
</div>

<!-- Updated At Field -->
<div class="form-group">
    {!! Form::label('updated_at', 'Updated At:') !!}
    <p>{{ $asistencia->updated_at }}</p>
</div>

