<div class="form-group col-sm-12">
    <h3>Datos del proyecto</h3>
</div>

<!-- Nombre Proyecto Field -->
<div class="form-group col-sm-6">
    {!! Form::label('Nombre_proyecto', 'Nombre:') !!}
    {!! Form::text('Nombre_proyecto', null, ['class' => 'form-control']) !!}
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

<!-- Nro Plantas Field
<div class="form-group col-sm-6">
    {!! Form::label('Nro_plantas', 'Número de plantas del edificio:') !!}
    <select name="Nro_plantas" class = 'form-control'>
        <option value=1>Una</option>
        <option value=2>Dos</option>
        <option value=3>Tres</option>
        <option value=4>Cuatro</option>
    </select>
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

<div class="form-group col-sm-6">
    {!! Form::label('IdComitente', 'Buscar comitente:') !!} <br>
    <select name="Comitente_id" class="js-example-basic-single form-group col-sm-12">
        <option value=""></option>
        @foreach ($comitentes as $comitente)
            <option value={{ $comitente->id }}>{{ $comitente->NombreComitente }} {{ $comitente->Apellido }}, {{ $comitente->DNI }}</option>
        @endforeach
    </select>
</div>

<!-- Nombrecomitente Field
<div class="form-group col-sm-6">
    {!! Form::label('NombreComitente', 'Nombres:') !!}
    {!! Form::text('NombreComitente', null, ['class' => 'form-control']) !!}
</div> -->

<!-- Apellido Field
<div class="form-group col-sm-6">
    {!! Form::label('Apellido', 'Apellidos:') !!}
    {!! Form::text('Apellido', null, ['class' => 'form-control']) !!}
</div>  -->

<!-- Dni Field
<div class="form-group col-sm-6">
    {!! Form::label('DNI', 'Dni:') !!}
    {!! Form::number('DNI', null, ['class' => 'form-control']) !!}
</div>  -->

<!-- Email Field
<div class="form-group col-sm-6">
    {!! Form::label('Email', 'Email:') !!}
    {!! Form::text('Email', null, ['class' => 'form-control']) !!}
</div>  -->

<!-- Telefono Field
<div class="form-group col-sm-6">
    {!! Form::label('Telefono', 'Telefono:') !!}
    {!! Form::number('Telefono', null, ['class' => 'form-control']) !!}
</div>  -->

<!-- Sexo Field
<div class="form-group col-sm-6">
    {!! Form::label('Sexo', 'Sexo:') !!}
    {!! Form::text('Sexo', null, ['class' => 'form-control']) !!}
</div> -->

<!-- Direccion Id Field
<div class="form-group col-sm-6">
    {!! Form::label('Direccion_id', 'Direccion Id:') !!}
    {!! Form::text('Direccion_id', null, ['class' => 'form-control']) !!}
</div> -->

<!-- Submit Field -->
<div class="form-group col-sm-12">
    <hr>
    {!! Form::submit('Crear', ['class' => 'btn btn-danger']) !!}
    <a href="{{ route('proyectos.index') }}" class="btn btn-default">Cancel</a>
</div>
