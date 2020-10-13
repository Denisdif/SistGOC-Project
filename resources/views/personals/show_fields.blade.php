<!-- Nombrepersonal Field -->
<div class="form-group">
    {!! Form::label('NombrePersonal', 'Nombrepersonal:') !!}
    <p>{{ $personal->NombrePersonal }}</p>
</div>

<!-- Apellido Field -->
<div class="form-group">
    {!! Form::label('Apellido', 'Apellido:') !!}
    <p>{{ $personal->Apellido }}</p>
</div>

<!-- Legajo Field -->
<div class="form-group">
    {!! Form::label('Legajo', 'Legajo:') !!}
    <p>{{ $personal->Legajo }}</p>
</div>

<!-- Fechanac Field -->
<div class="form-group">
    {!! Form::label('FechaNac', 'Fechanac:') !!}
    <p>{{ $personal->FechaNac }}</p>
</div>

<!-- Dni Field -->
<div class="form-group">
    {!! Form::label('DNI', 'Dni:') !!}
    <p>{{ $personal->DNI }}</p>
</div>

<!-- Rol Id Field -->
<div class="form-group">
    {!! Form::label('Rol_id', 'Rol Id:') !!}
    <p>{{ $personal->Rol_id }}</p>
</div>

<!-- User Id Field -->
<div class="form-group">
    {!! Form::label('User_id', 'User Id:') !!}
    <p>{{ $personal->User_id }}</p>
</div>

<!-- Created At Field -->
<div class="form-group">
    {!! Form::label('created_at', 'Created At:') !!}
    <p>{{ $personal->created_at }}</p>
</div>

<!-- Updated At Field -->
<div class="form-group">
    {!! Form::label('updated_at', 'Updated At:') !!}
    <p>{{ $personal->updated_at }}</p>
</div>

