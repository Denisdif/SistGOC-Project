<!-- Calle Field -->
<div class="form-group">
    {!! Form::label('Calle', 'Calle:') !!}
    <p>{{ $direccion->Calle }}</p>
</div>

<!-- Altura Field -->
<div class="form-group">
    {!! Form::label('Altura', 'Altura:') !!}
    <p>{{ $direccion->Altura }}</p>
</div>

<!-- Pais Id Field -->
<div class="form-group">
    {!! Form::label('Pais_id', 'Pais Id:') !!}
    <p>{{ $direccion->Pais_id }}</p>
</div>

<!-- Provincia Id Field -->
<div class="form-group">
    {!! Form::label('Provincia_id', 'Provincia Id:') !!}
    <p>{{ $direccion->Provincia_id }}</p>
</div>

<!-- Localidad Id Field -->
<div class="form-group">
    {!! Form::label('Localidad_id', 'Localidad Id:') !!}
    <p>{{ $direccion->Localidad_id }}</p>
</div>

<!-- Created At Field -->
<div class="form-group">
    {!! Form::label('created_at', 'Created At:') !!}
    <p>{{ $direccion->created_at }}</p>
</div>

<!-- Updated At Field -->
<div class="form-group">
    {!! Form::label('updated_at', 'Updated At:') !!}
    <p>{{ $direccion->updated_at }}</p>
</div>

