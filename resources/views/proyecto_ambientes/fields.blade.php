<div class="form-group col-sm-12">
    <h2>Carga</h2>
</div>

<!-- Ambiente Id Field -->
<div class="form-group col-sm-6">
    {!! Form::label('Ambiente_id', 'Ambiente:') !!}
    {!! Form::select('Ambiente_id', $ambienteItems, null, ['class' => 'form-control']) !!}
</div>

<!-- Cantidad Field -->
<div class="form-group col-sm-6">
    {!! Form::label('Cantidad', 'Cantidad:') !!}
    {!! Form::number('Cantidad', '1', ['class' => 'form-control','id' => 'Cantidades']) !!}
</div>


<div class="form-group col-sm-12">
    <a href="#" class="addRow btn btn-danger ">Agregar a lista</a>
</div>

<div class="form-group col-sm-12">
    <h2>Cola de carga</h2>
</div>

<div class="col-md-12">
    <table class="table table-striped table-bordered">
        <thead>
            <th>Ambiente</th>
            <th>Cantidad</th>
            <th width="125px">Accion</th>
        </thead>

        <tbody class="ColaCarga">

        </tbody>
    </table>
</div>

<!-- Submit Field -->
<div class="form-group col-sm-12">
</div>





{{--  <div class="text-right">
    <a href="javascript:history.back()" class="btn btn-primary btn-sm">Volver</a>
    <input type="reset" value="Limpiar" class="btn btn-secondary btn-sm">
    <button type="submit" class="btn btn-success btn-sm">Generar</button>
</div> --}}
