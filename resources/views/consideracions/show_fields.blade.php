<!-- Nombre Consideracion Field -->
<div class="form-group">
    {!! Form::label('Nombre_Consideracion', 'Nombre Consideracion:') !!}
    <p>{{ $consideracion->Nombre_Consideracion }}</p>
</div>

<!-- Descripcion Field -->
<div class="form-group">
    {!! Form::label('Descripcion', 'Descripcion:') !!}
    <p>{{ $consideracion->Descripcion }}</p>
</div>

<!-- Created At Field -->
<div class="form-group">
    {!! Form::label('created_at', 'Created At:') !!}
    <p>{{ $consideracion->created_at }}</p>
</div>

<!-- Updated At Field -->
<div class="form-group">
    {!! Form::label('updated_at', 'Updated At:') !!}
    <p>{{ $consideracion->updated_at }}</p>
</div>

