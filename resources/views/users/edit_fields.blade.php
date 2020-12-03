<!-- Name Field -->
<div class="form-group col-sm-6">
    {!! Form::label('name', 'Name:') !!}<span class="required">*</span>
    {!! Form::text('name', null, ['id'=>'name', 'class' => 'form-control', 'required']) !!}
</div>
<!-- Email Field -->
<div class="form-group col-sm-6">
    {!! Form::label('email', 'Email:') !!}<span class="required">*</span>
    {!! Form::email('email', null, ['id'=>'email', 'class' => 'form-control', 'required']) !!}
</div>

<!-- Password Field -->
<div class="form-group col-sm-6">
    {!! Form::label('password', 'Contraseña:') !!}
    <input class="form-control input-group__addon" id="pfNewPassword" type="password"
           name="password" required>
</div>
<div class="form-group col-sm-6">
    {!! Form::label('password_confirmation', 'Confirmar contraseña:') !!}
    <input class="form-control input-group__addon" id="pfNewConfirmPassword" type="password"
           name="password_confirmation" required>
</div>

<!-- Submit Field -->
<div class="form-group col-sm-12">
    {!! Form::submit('Save', ['class' => 'btn btn-primary']) !!}
    <a href="javascript:history.back()" class="btn btn-default">Cancelar</a>
</div>
