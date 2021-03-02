<div class="form-group col-sm-12">
    <h2>Carga</h2>
</div>

<!-- Ambiente Id Field -->
<div class="form-group col-sm-12">
    {!! Form::label('Ambiente_id', 'Ambiente:') !!} <br>
    {!! Form::select('Ambiente_id', $ambienteItems, null, ['class' => 'form-control', 'style' => 'width: 100%']) !!}
</div>

<!-- Cantidad Field -->
<div class="form-group col-sm-12">
    {!! Form::label('Cantidad', 'Cantidad:') !!} <br>
    {!! Form::number('Cantidad', '1', ['class' => 'form-control','id' => 'Cantidades']) !!}
</div>








{{--  <div class="text-right">
    <a href="javascript:history.back()" class="btn btn-primary btn-sm">Volver</a>
    <input type="reset" value="Limpiar" class="btn btn-secondary btn-sm">
    <button type="submit" class="btn btn-success btn-sm">Generar</button>
</div> --}}
