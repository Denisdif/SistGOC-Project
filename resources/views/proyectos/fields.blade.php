<!-- Nombre Proyecto Field -->
<div class="form-group col-sm-6">
    {!! Form::label('Nombre_proyecto', 'Nombre Proyecto:') !!}
    {!! Form::text('Nombre_proyecto', null, ['class' => 'form-control']) !!}
</div>

<!-- Tipo Proyecto Field -->
<div class="form-group col-sm-6">
    {!! Form::label('Tipo_proyecto', 'Tipo Proyecto:') !!}
    <select name="Tipo_proyecto" class = 'form-control'>
        <option value="Construcción">Construcción</option>
        <option value="Remodelación">Remodelación</option>
        <option value="Relevamiento">Relevamiento</option>
        <option value="General">General</option>
    </select>
</div>

<!-- Fecha Inicio Proy Field -->
<div class="form-group col-sm-6">
    {!! Form::label('Fecha_inicio_Proy', 'Fecha Inicio Proy:') !!}
    {!! Form::date('Fecha_inicio_Proy', null, ['class' => 'form-control','id'=>'Fecha_inicio_Proy']) !!}
</div>

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
    {!! Form::label('Fecha_fin_Proy', 'Fecha Fin Proy:') !!}
    {!! Form::date('Fecha_fin_Proy', null, ['class' => 'form-control','id'=>'Fecha_fin_Proy']) !!}
</div>

@push('scripts')
    <script type="text/javascript">
        $('#Fecha_fin_Proy').datetimepicker({
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

<!-- Nro Plantas Field -->
<div class="form-group col-sm-6">
    {!! Form::label('Nro_plantas', 'Nro Plantas:') !!}
    {!! Form::number('Nro_plantas', null, ['class' => 'form-control']) !!}
</div>

<!-- Descripcion Field -->
<div class="form-group col-sm-12 col-lg-12">
    {!! Form::label('Descripcion', 'Descripcion:') !!}
    {!! Form::textarea('Descripcion', null, ['class' => 'form-control']) !!}
</div>

<!-- Submit Field -->
<div class="form-group col-sm-12">
    {!! Form::submit('Save', ['class' => 'btn btn-danger']) !!}
    <a href="{{ route('proyectos.index') }}" class="btn btn-default">Cancel</a>
</div>
