<div class="form-group col-sm-12">
    <h3>Datos del proyecto</h3>
</div>

<!-- Nombre Proyecto Field
<div class="form-group col-sm-6">
    {!! Form::label('Nombre_proyecto', 'Nombre:') !!}
    {!! Form::text('Nombre_proyecto', null, ['class' => 'form-control']) !!}
</div> -->

<!-- Codigo catastral Field -->
<div class="form-group col-sm-6">
    {!! Form::label('Codigo_catastral', 'Código catastral:') !!}
    {!! Form::number('Codigo_catastral', null, ['class' => 'form-control']) !!}
</div>

<!-- Tipo Proyecto Field -->
<div class="form-group col-sm-6">
    {!! Form::label('Tipo_proyecto', 'Tipo de Proyecto:') !!}
    {!! Form::select('Tipo_proyecto_id', $tipo_proyectoItems, null, ['class' => 'form-control']) !!}
</div>

<!-- Fecha Inicio Proy Field
<div class="form-group col-sm-6">
    {!! Form::label('Fecha_inicio_Proy', 'Fecha Inicio Proy:') !!}
    {!! Form::date('Fecha_inicio_Proy', null, ['class' => 'form-control','id'=>'Fecha_inicio_Proy']) !!}
</div> -->

@push('scripts')
    <script type="text/javascript">
        $('#Fecha_inicio_Proy').datetimepicker({
            format: 'YYYY-MM-DD HH:mm:ss',
            useCurrent: false
        })
    </script>
@endpush

<!-- Informe de proyecto -->
<div class="form-group col-sm-6">
    {!! Form::label('Informe', 'Informe de entrevistas y relevamiento:') !!}
    {!! Form::file('Informe') !!}
</div>

<!-- Fecha Fin Proy Field -->
<div class="form-group col-sm-6">
    {!! Form::label('Fecha_fin_Proy', 'Fecha limite:') !!}
    {!! Form::date('Fecha_fin_Proy', null, ['class' => 'form-control','id'=>'Fecha_fin_Proy']) !!}
</div>

@push('scripts')
    <script type="text/javascript">
        $('#Fecha_fin_Proy').datetimepicker({
            format: 'YYYY-MM-DD HH:mm:ss',
            useCurrent: true
        })
    </script>
@endpush

<!-- Director Id Field
<div class="form-group col-sm-6">
    {!! Form::label('Director_id', 'Director Id:') !!}
    {!! Form::number('Director_id', null, ['class' => 'form-control']) !!}
</div> -->

<!-- Comitente Id Field
<div class="form-group col-sm-6">
    {!! Form::label('Comitente_id', 'Comitente Id:') !!}
    {!! Form::number('Comitente_id', null, ['class' => 'form-control']) !!}
</div> -->

<!-- Descripcion Field -->
<div class="form-group col-sm-12 col-lg-12">
    {!! Form::label('Descripcion', 'Descripción:') !!}
    {!! Form::textarea('Descripcion', null, ['class' => 'form-control']) !!}
</div>

<div class="form-group col-sm-12">
    <hr>
    <h3>Comitente</h3>
</div>

<div class="form-group col-sm-12">
    {!! Form::label('IdComitente', 'Buscar comitente:') !!} <br>
    <select id="SelectComitente" name="Comitente_id" class="form-group col-sm-6">
        <option value=""></option>
        @foreach ($comitentes as $comitente)
            <option value={{ $comitente->id }}>{{ $comitente->NombreComitente }} {{ $comitente->ApellidoComitente }}, {{ $comitente->Cuit }}</option>
        @endforeach
    </select>
</div>

<!-- Nombrecomitente Field -->
<div class="form-group col-sm-6">
    {!! Form::label('NombreComitente', 'Nombres:') !!}
    {!! Form::text('NombreComitente', null, ['class' => 'form-control']) !!}
</div>

<!-- Apellido Field -->
<div class="form-group col-sm-6">
    {!! Form::label('Apellido', 'Apellidos:') !!}
    {!! Form::text('Apellido', null, ['class' => 'form-control']) !!}
</div>

<!-- Email Field -->
<div class="form-group col-sm-6">
    {!! Form::label('Email', 'Email:') !!}
    {!! Form::text('Email', null, ['class' => 'form-control']) !!}
</div>

<!-- Telefono Field -->
<div class="form-group col-sm-6">
    {!! Form::label('Telefono', 'Telefono:') !!}
    {!! Form::number('Telefono', null, ['class' => 'form-control']) !!}
</div>

<!-- Cuit Field -->
<div class="form-group col-sm-6">
    {!! Form::label('Cuit', 'Cuit:') !!}
    {!! Form::number('Cuit', null, ['class' => 'form-control']) !!}
</div>

<div class="form-group col-sm-6">
    {!! Form::label('Sexo', 'Sexo:') !!}
    {!! Form::select('Sexo_id', $sexoItems, null, ['class' => 'form-control']) !!}
</div>

<!-- Direccion Id Field
<div class="form-group col-sm-6">
    {!! Form::label('Direccion_id', 'Direccion Id:') !!}
    {!! Form::text('Direccion_id', null, ['class' => 'form-control']) !!}
</div> -->

<!-- Submit Field -->
<div class="form-group col-sm-12">
    <hr>
    {!! Form::submit('Crear', ['class' => 'btn btn-danger']) !!}
    <a href="javascript:history.back()" class="btn btn-default">Cancelar</a>
</div>
