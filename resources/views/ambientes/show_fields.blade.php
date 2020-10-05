<!-- Nombre Ambiente Field -->
<div class="form-group">
    {!! Form::label('Nombre_ambiente', 'Nombre Ambiente:') !!}
    <p>{{ $ambiente->Nombre_ambiente }}</p>
</div>

<!-- Imagen Field -->
<div class="form-group">
    {!! Form::label('Imagen', 'Imagen:') !!}
    <p>{{ $ambiente->Imagen }}</p>
</div>

<!-- Descripcion Field -->
<div class="form-group">
    {!! Form::label('Descripcion', 'Descripcion:') !!}
    <p>{{ $ambiente->Descripcion }}</p>
</div>

<!-- Created At Field -->
<div class="form-group">
    {!! Form::label('created_at', 'Created At:') !!}
    <p>{{ $ambiente->created_at }}</p>
</div>

<!-- Updated At Field -->
<div class="form-group">
    {!! Form::label('updated_at', 'Updated At:') !!}
    <p>{{ $ambiente->updated_at }}</p>
</div>

