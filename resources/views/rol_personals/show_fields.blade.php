<!-- Nombrerol Field -->
<div class="form-group">
    {!! Form::label('NombreRol', 'Nombrerol:') !!}
    <p>{{ $rolPersonal->NombreRol }}</p>
</div>

<!-- Descripcion Field -->
<div class="form-group">
    {!! Form::label('Descripcion', 'Descripcion:') !!}
    <p>{{ $rolPersonal->Descripcion }}</p>
</div>

<!-- Created At Field -->
<div class="form-group">
    {!! Form::label('created_at', 'Created At:') !!}
    <p>{{ $rolPersonal->created_at }}</p>
</div>

<!-- Updated At Field -->
<div class="form-group">
    {!! Form::label('updated_at', 'Updated At:') !!}
    <p>{{ $rolPersonal->updated_at }}</p>
</div>

