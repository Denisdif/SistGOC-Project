<div class="form-group col-sm-12">
    <h3>Datos personales</h3>
</div>

<!-- Nombrepersonal Field -->
<div class="form-group col-sm-6">
    {!! Form::label('NombrePersonal', 'Nombres:') !!}
    {!! Form::text('NombrePersonal', null, ['class' => 'form-control']) !!}
</div>

<!-- Apellido Field -->
<div class="form-group col-sm-6">
    {!! Form::label('Apellido', 'Apellidos:') !!}
    {!! Form::text('Apellido', null, ['class' => 'form-control']) !!}
</div>

<!-- Legajo Field
<div class="form-group col-sm-6">
    {!! Form::label('Legajo', 'Legajo:') !!}
    {!! Form::number('Legajo', null, ['class' => 'form-control']) !!}
</div> -->

<!-- Dni Field -->
<div class="form-group col-sm-6">
    {!! Form::label('DNI', 'Dni:') !!}
    {!! Form::number('DNI', null, ['class' => 'form-control']) !!}
</div>

<!-- Sexo Field -->
<div class="form-group col-sm-6">
    {!! Form::label('Sexo', 'Sexo:') !!}
    {!! Form::select('Sexo_id', $sexoItems, null, ['class' => 'form-control']) !!}
</div>

<!-- Phone Field -->
<div class="form-group col-sm-6">
    {!! Form::label('Telefono', 'Numero de Telefono:') !!}
    {!! Form::number('Telefono', null, ['id'=>'Telefono', 'class' => 'form-control']) !!}
</div>

<!-- Fechanac Field -->
<div class="form-group col-sm-6">
    {!! Form::label('FechaNac', 'Fecha de nacimiento:') !!}
    {!! Form::date('FechaNac', null, ['class' => 'form-control','id'=>'FechaNac']) !!}
</div>

@push('scripts')
    <script type="text/javascript">
        $('#FechaNac').datetimepicker({
            format: 'YYYY-MM-DD HH:mm:ss',
            useCurrent: false
        })
    </script>
@endpush
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



<!-- Submit Field -->
<div class="form-group col-sm-12">
    <hr>
    {!! Form::submit('Save', ['class' => 'btn btn-danger']) !!}
    <a href="{{ route('personals.index') }}" class="btn btn-default">Cancel</a>
</div>
