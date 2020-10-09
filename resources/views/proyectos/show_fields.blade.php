<!-- Nombre Proyecto Field -->
<div class="form-group">
    {!! Form::label('Nombre_proyecto', 'Nombre Proyecto:') !!}
    <p>{{ $proyecto->Nombre_proyecto }}</p>
</div>

<!-- Tipo Proyecto Field -->
<div class="form-group">
    {!! Form::label('Tipo_proyecto', 'Tipo Proyecto:') !!}
    <p>{{ $proyecto->Tipo_proyecto }}</p>
</div>

<!-- Nro Plantas Field -->
<div class="form-group">
    {!! Form::label('Nro_plantas', 'Nro Plantas:') !!}
    <p>{{ $proyecto->Nro_plantas }}</p>
</div>

<!-- Fecha Inicio Proy Field -->
<div class="form-group">
    {!! Form::label('Fecha_inicio_Proy', 'Fecha Inicio Proy:') !!}
    <p>{{ $proyecto->Fecha_inicio_Proy }}</p>
</div>

<!-- Fecha Fin Proy Field -->
<div class="form-group">
    {!! Form::label('Fecha_fin_Proy', 'Fecha Fin Proy:') !!}
    <p>{{ $proyecto->Fecha_fin_Proy }}</p>
</div>

<!-- Director Id Field -->
<div class="form-group">
    {!! Form::label('Director_id', 'Director Id:') !!}
    <p>{{ $proyecto->Director_id }}</p>
</div>

<!-- Comitente Id Field -->
<div class="form-group">
    {!! Form::label('Comitente_id', 'Comitente Id:') !!}
    <p>{{ $proyecto->Comitente_id }}</p>
</div>

<!-- Descripcion Field -->
<div class="form-group">
    {!! Form::label('Descripcion', 'Descripcion:') !!}
    <p>{{ $proyecto->Descripcion }}</p>
</div>

<!-- Created At Field -->
<div class="form-group">
    {!! Form::label('created_at', 'Created At:') !!}
    <p>{{ $proyecto->created_at }}</p>
</div>

<!-- Updated At Field -->
<div class="form-group">
    {!! Form::label('updated_at', 'Updated At:') !!}
    <p>{{ $proyecto->updated_at }}</p>
</div>

