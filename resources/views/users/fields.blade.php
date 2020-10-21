<!-- Name Field -->
<div class="form-group col-sm-6">
    {!! Form::label('Nombre_usuario', 'Nombre de usuario:') !!}
    {!! Form::text('Nombre_usuario', null, ['class' => 'form-control']) !!}
</div>
<!-- Email Field -->
<div class="form-group col-sm-6">
    {!! Form::label('email', 'Email:') !!}<span class="required">*</span>
    {!! Form::email('Email', null, ['id'=>'email', 'class' => 'form-control', 'required']) !!}
</div>
<!-- Password Field -->
<div class="form-group col-sm-3">
    {!! Form::label('password', 'Contraseña:') !!}
    <input class="form-control input-group__addon" id="pfNewPassword" type="password"
           name="password" required>
</div>
<div class="form-group col-sm-3">
    {!! Form::label('password_confirmation', 'Confirmar Contraseña:') !!}
    <input class="form-control input-group__addon" id="pfNewConfirmPassword" type="password"
           name="password_confirmation" required>
</div>

<!-- Rol Field -->
<div class="form-group col-sm-6">
    {!! Form::label('Rol_id', 'Rol de usuario:') !!}
    {!! Form::select('Rol_id', $RolPersonalItems, null, ['class' => 'form-control']) !!}
</div>

<!-- Submit Field -->
<div class="form-group col-sm-12">
    {!! Form::submit('Save', ['class' => 'btn btn-danger']) !!}
    <a href="{!! route('personals.show', $personal->id) !!}" class="btn btn-default">Cancelar</a>
</div>
