<!-- Nombre Proyecto Field -->

<div class="col-sm-6">

    <!--<h2>Datos del proyecto</h2><br>-->

    {!! Form::label('Nombre_proyecto', 'Código de proyecto:') !!}
    {{ $proyecto->id }} <br>

    {!! Form::label('Tipo_proyecto', 'Tipo de proyecto:') !!}
    {{ $proyecto->Tipo_proyecto->Nombre }} <br>

    {!! Form::label('Fecha_inicio_Proy', 'Fecha de creación:') !!}
    {{ $proyecto->get_fecha_inicio() }} <br>

    {!! Form::label('Fecha_fin_Proy', 'Fecha de finalización:') !!}
    {{ $proyecto->get_fecha_fin() }} <br>

    {!! Form::label('Director_id', 'Director:') !!}
    {{ $proyecto->director->ApellidoPersonal }} {{ $proyecto->director->NombrePersonal }} <br>

    {!! Form::label('Comitente_id', 'Comitente:') !!}
    {{ $proyecto->comitente->ApellidoComitente }} {{ $proyecto->comitente->NombreComitente }} <br>

    {!! Form::label('Estimacion', 'Cantidad de horas de desarrollo estimadas:') !!}
    {{ $proyecto->duracionEstimadaRealProyecto() }} horas <br>

    {!! Form::label('Dirección', 'Dirección:') !!}
    {{ $proyecto->direccion->Calle}} {{ $proyecto->direccion->Altura}}, {{ $proyecto->direccion->localidad->localidad}}, {{ $proyecto->direccion->provincia->provincia}}, {{ $proyecto->direccion->pais->pais}} <br>

    {!! Form::label('Descripcion', 'Descripción:') !!}
    {{ $proyecto->Descripcion }} <br> <br>

</div>

<div class="col-sm-6 text-center">
    <canvas id="estado_proyecto" width="40" height="15"></canvas><br>
    <b>Completado: {{ round ( $porcentaje_finalizacion,2) }}%</b>
</div>
