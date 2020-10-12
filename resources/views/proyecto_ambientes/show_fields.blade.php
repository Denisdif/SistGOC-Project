<!-- Cantidad Field -->
<div class="form-group">
    {!! Form::label('Cantidad', 'Cantidad:') !!}
    <p>{{ $proyectoAmbiente->Cantidad }}</p>
</div>

<!-- Ambiente Id Field -->
<div class="form-group">
    {!! Form::label('Ambiente_id', 'Ambiente Id:') !!}
    <p>{{ $proyectoAmbiente->Ambiente_id }}</p>
</div>

<!-- Proyecto Id Field -->
<div class="form-group">
    {!! Form::label('Proyecto_id', 'Proyecto Id:') !!}
    <p>{{ $proyectoAmbiente->Proyecto_id }}</p>
</div>

<!-- Created At Field -->
<div class="form-group">
    {!! Form::label('created_at', 'Created At:') !!}
    <p>{{ $proyectoAmbiente->created_at }}</p>
</div>

<!-- Updated At Field -->
<div class="form-group">
    {!! Form::label('updated_at', 'Updated At:') !!}
    <p>{{ $proyectoAmbiente->updated_at }}</p>
</div>

