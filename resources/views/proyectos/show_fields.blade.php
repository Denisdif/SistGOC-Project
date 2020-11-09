<!-- Nombre Proyecto Field -->


<div class="col-md-4 mb-3">
    <h2>Datos del proyecto</h2><br>
    {!! Form::label('Nombre_proyecto', 'Nombre Proyecto:') !!}
    {{ $proyecto->Nombre_proyecto }} <br>

    {!! Form::label('Tipo_proyecto', 'Tipo Proyecto:') !!}
    {{ $proyecto->Tipo_proyecto->Nombre }} <br>

    {!! Form::label('Fecha_inicio_Proy', 'Fecha de creación:') !!}
    {{ $proyecto->created_at }} <br>

    {!! Form::label('Fecha_fin_Proy', 'Fecha de finalización:') !!}
    {{ $proyecto->Fecha_fin_Proy }} <br>

    {!! Form::label('Director_id', 'Director:') !!}
    {{ $proyecto->director->ApellidoPersonal }} {{ $proyecto->director->NombrePersonal }} <br>

    {!! Form::label('Estimacion', 'Cantidad de horas de desarrollo estimadas:') !!}
    {{ $proyecto->duracionEstimadaReal()}} <br>

    {!! Form::label('Descripcion', 'Descripcion:') !!}
    {{ $proyecto->Descripcion }} <br><br>

</div>

<!-- Tipo Proyecto Field
<div class="col-md-4 mb-3">
    {!! Form::label('Tipo_proyecto', 'Tipo Proyecto:') !!}
    <p>{{ $proyecto->Tipo_proyecto->Nombre }}</p>
</div> -->

<!-- Nro Plantas Field
<div class="col-md-4 mb-3">
    {!! Form::label('Nro_plantas', 'Nro Plantas:') !!}
    <p>{{ $proyecto->Nro_plantas }}</p>
</div> -->

<!-- Fecha Inicio Proy Field
<div class="col-md-4 mb-3">
    {!! Form::label('Fecha_inicio_Proy', 'Fecha Inicio Proy:') !!}
    <p>{{ $proyecto->Fecha_inicio_Proy }}</p>
</div> -->

<!-- Fecha Fin Proy Field
<div class="col-md-4 mb-3">
    {!! Form::label('Fecha_fin_Proy', 'Fecha Fin Proy:') !!}
    <p>{{ $proyecto->Fecha_fin_Proy }}</p>
</div> -->

<!-- Director Id Field
<div class="col-md-4 mb-3">
    {!! Form::label('Director_id', 'Director Id:') !!}
    <p>{{ $proyecto->Director_id }}</p>
</div> -->

<!-- Comitente Id Field
<div class="col-md-4 mb-3">
    {!! Form::label('Comitente_id', 'Comitente Id:') !!}
    <p>{{ $proyecto->Comitente_id }}</p>
</div> -->

<!-- Descripcion Field
<div class="col-md-4 mb-3">
    {!! Form::label('Descripcion', 'Descripcion:') !!}
    <p>{{ $proyecto->Descripcion }}</p>
</div> -->

<!-- Created At Field
<div class="col-md-4 mb-3">
    {!! Form::label('created_at', 'Created At:') !!}
    <p>{{ $proyecto->created_at }}</p>
</div> -->

<!-- Updated At Field
<div class="col-md-4 mb-3">
    {!! Form::label('updated_at', 'Updated At:') !!}
    <p>{{ $proyecto->updated_at }}</p>
</div> -->


