<!-- Nombre Sexo Field -->
<div class="form-group">
    {!! Form::label('Nombre_sexo', 'Nombre Sexo:') !!}
    <p>{{ $sexo->Nombre_sexo }}</p>
</div>

<!-- Created At Field -->
<div class="form-group">
    {!! Form::label('created_at', 'Created At:') !!}
    <p>{{ $sexo->created_at }}</p>
</div>

<!-- Updated At Field -->
<div class="form-group">
    {!! Form::label('updated_at', 'Updated At:') !!}
    <p>{{ $sexo->updated_at }}</p>
</div>

