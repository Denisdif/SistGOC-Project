
<div class="form-group">

    {!! Form::label('NombrePersonal', 'Nombre completo:') !!}
    {{ $personal->ApellidoPersonal }} {{ $personal->NombrePersonal }} <br>

    {!! Form::label('Legajo', 'Numero de legajo:') !!}
    {{ $personal->id }} <br>

    {!! Form::label('DNI', 'Dni:') !!}
    {{ $personal->DNI }} <br>

    {!! Form::label('Edad', 'Edad:') !!}
    {{ $personal->edad() }} años<br>

    {!! Form::label('FechaNac', 'Fecha de Nacimiento:') !!}
    {{ $personal->get_fecha_nac() }} <br>

    {!! Form::label('Telefono', 'Numero de teléfono:') !!}
    {{ $personal->Telefono }} <br>

    {!! Form::label('Sexo', 'Sexo:') !!}
    {{ $personal->sexo->Nombre_sexo }} <br>

    {!! Form::label('Domicilio', 'Domicilio:') !!}
    {{ $personal->direccion->Calle}} {{ $personal->direccion->Altura}}, {{ $personal->direccion->localidad->localidad}}, {{ $personal->direccion->provincia->provincia}}, {{ $personal->direccion->pais->pais}} <br>
</div>

<!-- Nombrepersonal Field
<div class="form-group">
    {!! Form::label('NombrePersonal', 'Nombrepersonal:') !!}
    <p>{{ $personal->NombrePersonal }}</p>
</div> -->

<!-- Apellido Field
<div class="form-group">
    {!! Form::label('Apellido', 'Apellido:') !!}
    <p>{{ $personal->Apellido }}</p>
</div> -->

<!-- Legajo Field
<div class="form-group">
    {!! Form::label('Legajo', 'Legajo:') !!}
    <p>{{ $personal->Legajo }}</p>
</div> -->

<!-- Fechanac Field
<div class="form-group">
    {!! Form::label('FechaNac', 'Fechanac:') !!}
    <p>{{ $personal->FechaNac }}</p>
</div> -->

<!-- Dni Field
<div class="form-group">
    {!! Form::label('DNI', 'Dni:') !!}
    <p>{{ $personal->DNI }}</p>
</div> -->

<!-- User Id Field
<div class="form-group">
    {!! Form::label('User_id', 'User Id:') !!}
    <p>{{ $personal->User_id }}</p>
</div> -->

<!-- Created At Field
<div class="form-group">
    {!! Form::label('created_at', 'Created At:') !!}
    <p>{{ $personal->created_at }}</p>
</div> -->

<!-- Updated At Field
<div class="form-group">
    {!! Form::label('updated_at', 'Updated At:') !!}
    <p>{{ $personal->updated_at }}</p>
</div> -->
