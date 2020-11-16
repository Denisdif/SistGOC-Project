<div class="form-group col-sm-12">
    <h3>Datos del proyecto</h3>
</div>

<!-- Nombre Proyecto Field
<div class="form-group col-sm-6">
    {!! Form::label('Nombre_proyecto', 'Nombre:') !!}
    {!! Form::text('Nombre_proyecto', null, ['class' => 'form-control']) !!}
</div> -->

<!-- Codigo de proyecto Field
<div class="form-group col-sm-6">
    {!! Form::label('Codigo_catastral', 'Código de proyecto:') !!}
    {!! Form::text('Codigo_de_proyecto', null, ['class' => 'form-control']) !!}
</div> -->

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


<!-- Informe de proyecto -->
<div class="form-group col-sm-6">
    {!! Form::label('Informe', 'Informe de entrevistas y relevamiento:') !!}
    {!! Form::file('Informe', ['class' => 'form-control']) !!}
</div>

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
    <h3>Dirección</h3>
</div>

<!-- Pais Field -->
<div class="form-group col-sm-6">
    <div>
        <label for="pais_id" class="">Pais</label>
        <select name="pais_id" id="pais_id" class=" form-control" required>
            <option value="" selected disabled>--Seleccione--</option>
            @foreach ($paises as $pais)
            <option value="{{$pais->id}}">{{$pais->pais}}</option>
            @endforeach
        </select>
        @error('pais_id')
        <span class="invalid-feedback" role="alert">
            <strong>{{ $message }}</strong>
        </span>
        @enderror
    </div>
</div>

<!-- Provincia Field -->
<div class="form-group col-sm-6">
    <div>
        <label for="provincia_id" class="">Provincia</label>
        <select name="provincia_id" id="provincia_id" class=" form-control" disabled>
            <option value="" selected disabled>--Seleccione--</option>
        </select>
        @error('provincia_id')
        <span class="invalid-feedback" role="alert">
            <strong>{{ $message }}</strong>
        </span>
        @enderror
    </div>
</div>

<!-- Localidad Field -->
<div class="form-group col-sm-6">
    <div>
        <label for="localidad_id" class="">Localidad</label>
        <select name="localidad_id" id="localidad_id" class="form-control" disabled>
            <option value="" selected disabled>--Seleccione--</option>
        </select>
        @error('localidad_id')
        <span class="invalid-feedback" role="alert">
            <strong>{{ $message }}</strong>
        </span>
        @enderror
    </div>
</div>

<!-- Codigo postal Field -->
<div class="form-group col-sm-6">
    {!! Form::label('Codigo postal', 'Codigo postal:') !!}
    {!! Form::number('Codigo_postal', null, ['class' => 'form-control']) !!}
</div>

<!-- Calle Field -->
<div class="form-group col-sm-6">
    {!! Form::label('Calle', 'Calle:') !!}
    {!! Form::text('Calle', null, ['class' => 'form-control']) !!}
</div>

<!-- Altura Field -->
<div class="form-group col-sm-6">
    {!! Form::label('Altura', 'Altura:') !!}
    {!! Form::number('Altura', null, ['class' => 'form-control']) !!}
</div>

<div class="form-group col-sm-12">
    <hr>
    <h3>Comitente</h3>
</div>


<div class="form-group col-sm-6" id="esconder2">
    {!! Form::label('IdComitente', 'Buscar comitente:') !!} <br>
    <select id="SelectComitente" name="Comitente_id" class="form-control">
        <option value=""></option>
        @foreach ($comitentes as $comitente)
            <option value={{ $comitente->id }}>{{ $comitente->NombreComitente }} {{ $comitente->ApellidoComitente }}, {{ $comitente->Cuit }}</option>
        @endforeach
    </select>
</div>

<div class="form-group col-sm-6" id="divComitente1">
    {!! Form::label('', '') !!} <br>
    <a id="CargarComitente" class="btn btn-danger">Cargar nuevo comitente</a>
</div>

<div class="form-group col-sm-6" id="divComitente2" style="display: none">
    {!! Form::label('', '') !!} <br>
    <a id="SeleccionarComitente" class="btn btn-danger">Seleccionar comitente</a>
</div>

<div id="esconder" style="display: none">

<div class="form-group col-sm-6">
    {!! Form::label('TipoComitente', 'Tipo de Comitente:') !!} <br>
    <select id="TipoComitente" name="TipoPersona" class="form-control">
        <option value="1">Persona fisica</option>
        <option value="2">Persona juridia</option>
    </select>
</div>

<!-- Cuit Field -->
<div class="form-group col-sm-6">
    {!! Form::label('Cuit', 'Cuit:') !!}
    {!! Form::number('Cuit', null, ['class' => 'form-control']) !!}
</div>

<!-- Nombrecomitente Field -->
<div class="form-group col-sm-6">
    {!! Form::label('NombreComitente', 'Nombres:') !!}
    {!! Form::text('NombreComitente', null, ['class' => 'form-control']) !!}
</div>

<!-- Apellido Field -->
<div class="form-group col-sm-6" id="EtiquetaOcultaApellido">
    {!! Form::label('Apellido', 'Apellidos:') !!}
    {!! Form::text('Apellido', null, ['class' => 'form-control', 'id' => 'CampoOcultoApellido']) !!}
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

<div class="form-group col-sm-6" id="EtiquetaOcultaSexo">
    {!! Form::label('Sexo', 'Sexo:') !!}
    {!! Form::select('Sexo_id', $sexoItems, null, ['class' => 'form-control', 'id' => 'CampoOcultoSexo']) !!}
</div>

<!-- Direccion Id Field
<div class="form-group col-sm-6">
    {!! Form::label('Direccion_id', 'Direccion Id:') !!}
    {!! Form::text('Direccion_id', null, ['class' => 'form-control']) !!}
</div> -->

</div>


<!-- Submit Field -->
<div class="form-group col-sm-12">
    <hr>
    {!! Form::submit('Crear', ['class' => 'btn btn-danger']) !!}
    <a href="javascript:history.back()" class="btn btn-default">Cancelar</a>
</div>

