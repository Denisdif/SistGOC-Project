<!-- Nombrepersonal Field -->
<div class="form-group col-sm-6">
    {!! Form::label('NombrePersonal', 'Nombrepersonal:') !!}
    {!! Form::text('NombrePersonal', null, ['class' => 'form-control']) !!}
</div>

<!-- Apellido Field -->
<div class="form-group col-sm-6">
    {!! Form::label('Apellido', 'Apellido:') !!}
    {!! Form::text('Apellido', null, ['class' => 'form-control']) !!}
</div>

<!-- Legajo Field -->
<div class="form-group col-sm-6">
    {!! Form::label('Legajo', 'Legajo:') !!}
    {!! Form::number('Legajo', null, ['class' => 'form-control']) !!}
</div>

<!-- Fechanac Field -->
<div class="form-group col-sm-6">
    {!! Form::label('FechaNac', 'Fechanac:') !!}
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

<!-- Dni Field -->
<div class="form-group col-sm-6">
    {!! Form::label('DNI', 'Dni:') !!}
    {!! Form::number('DNI', null, ['class' => 'form-control']) !!}
</div>

<!-- Rol Id Field -->
<div class="form-group col-sm-6">
    {!! Form::label('Rol_id', 'Rol Id:') !!}
    {!! Form::select('Rol_id', $rol_personalItems, null, ['class' => 'form-control']) !!}
</div>

<!-- User Id Field -->
<div class="form-group col-sm-6">
    {!! Form::label('User_id', 'User Id:') !!}
    {!! Form::select('User_id', $userItems, null, ['class' => 'form-control']) !!}
</div>

<!-- Submit Field -->
<div class="form-group col-sm-12">
    {!! Form::submit('Save', ['class' => 'btn btn-primary']) !!}
    <a href="{{ route('personals.index') }}" class="btn btn-default">Cancel</a>
</div>
