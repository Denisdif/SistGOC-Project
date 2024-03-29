<div class="form-group col-sm-12">
    <h3>Datos del proyecto</h3>
    <hr>
</div>

    <!-- Tipo Proyecto Field -->
    <div class="form-group col-sm-6">
        {!! Form::label('Tipo_proyecto', 'Tipo de Proyecto:') !!}
        {!! Form::select('Tipo_proyecto_id', $tipo_proyectoItems, null, ['class' => 'form-control', 'required']) !!}
    </div>


    <!-- Fecha Fin Proy Field -->
    <div class="form-group col-sm-6">
        {!! Form::label('Fecha_fin_Proy', 'Fecha límite:') !!}
        <input class="form-control" type="date" name="Fecha_fin_Proy" id="Fecha_fin_Proy" required
        value="{{ Carbon\Carbon::now()->format('Y-m-d') }}"
        min="{{ Carbon\Carbon::now()->format('Y-m-d') }}">
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
        {!! Form::file('Informe', ['class' => 'form-control', 'required']) !!}
    </div>

    <!-- Descripcion Field -->
    <div class="form-group col-sm-12 col-lg-12">
        {!! Form::label('Descripcion', 'Descripción:') !!}
        {!! Form::textarea('Descripcion', old('Descripcion'), ['class' => 'form-control']) !!}
    </div>

    <div class="form-group col-sm-12">
        <hr>
        <h3>Dirección</h3>
    </div>

    <!-- Pais Field -->
    <div class="form-group col-sm-6">
        <div>
            <label for="pais_id" class="">País</label>
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
            <select name="provincia_id" id="provincia_id" class=" form-control" disabled required>
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
            <select name="localidad_id" id="localidad_id" class="form-control" disabled required>
                <option value="" selected disabled>--Seleccione--</option>
            </select>
            @error('localidad_id')
            <span class="invalid-feedback" role="alert">
                <strong>{{ $message }}</strong>
            </span>
            @enderror
        </div>
    </div>



    <!-- Calle Field -->
    <div class="form-group col-sm-6">
        {!! Form::label('Calle', 'Calle:') !!}
        {!! Form::text('Calle', old('Calle'), ['class' => 'form-control','required']) !!}
    </div>

    <!-- Altura Field -->
    <div class="form-group col-sm-6">
        {!! Form::label('Altura', 'Altura:') !!}
        {!! Form::number('Altura', old('Altura'), ['class' => 'form-control','required', 'min' => '0']) !!}
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
            <option value="1">Persona física</option>
            <option value="2">Persona jurídica</option>
        </select>
    </div>

    <!-- Cuit Field -->
    <div class="form-group col-sm-6">
        {!! Form::label('Cuit', 'Cuit:') !!}
        {!! Form::number('Cuit', null, ['class' => 'form-control']) !!}
    </div>

    <!-- Nombrecomitente Field -->
    <div class="form-group col-sm-6">
        {!! Form::label('NombreComitente', 'Nombres:', ['class' => 'Nombre2']) !!}
        <label style="display: none" class="Nombre" for="Name">Razón social:</label>
        {!! Form::text('NombreComitente', old('NombreComitente'), ['class' => 'form-control']) !!}
    </div>

    <!-- Apellido Field -->
    <div class="form-group col-sm-6" id="EtiquetaOcultaApellido">
        {!! Form::label('Apellido', 'Apellidos:') !!}
        <input class="form-control" value="{{ old('Apellidooo') }}" type="text" name="Apellidooo" id="CampoOcultoApellido">
    </div>

    <!-- Email Field -->
    <div class="form-group col-sm-6">
        {!! Form::label('Email', 'Email:') !!}
        {!! Form::text('Email', old('Email'), ['class' => 'form-control']) !!}
    </div>

    <!-- Telefono Field -->
    <div class="form-group col-sm-6">
        {!! Form::label('Telefono', 'Telefono:') !!}
        {!! Form::number('Telefono', old('Telefono'), ['class' => 'form-control']) !!}
    </div>

    <div class="form-group col-sm-6" id="EtiquetaOcultaSexo">
        {!! Form::label('Sexo', 'Sexo:') !!}
        {!! Form::select('Sexo_id', $sexoItems, null, ['class' => 'form-control', 'id' => 'CampoOcultoSexo']) !!}
    </div>


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

    <!-- Direccion Id Field
    <div class="form-group col-sm-6">
        {!! Form::label('Direccion_id', 'Direccion Id:') !!}
        {!! Form::text('Direccion_id', null, ['class' => 'form-control']) !!}
    </div> -->

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
