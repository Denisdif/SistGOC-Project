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

<!-- User Id Field
<div class="form-group col-sm-6">
    {!! Form::label('User_id', 'User Id:') !!}
    {!! Form::select('User_id', $userItems, null, ['class' => 'form-control']) !!}
</div> -->

<!-- Submit Field -->
<div class="form-group col-sm-12">
    {!! Form::submit('Save', ['class' => 'btn btn-danger']) !!}
    <a href="{{ route('personals.index') }}" class="btn btn-default">Cancel</a>
</div>
