<!-- Nombre Tarea Field -->
<div class="form-group col-sm-6">
    {!! Form::label('Nombre_tarea', 'Nombre de la Tarea:') !!}
    {!! Form::text('Nombre_tarea', null, ['class' => 'form-control', 'required']) !!}
</div>

<!-- Tipo Tarea Id Field -->
<div class="form-group col-sm-6">
    {!! Form::label('Tipo_tarea_id', 'Tipo de Tarea:') !!}
    {!! Form::select('Tipo_tarea_id', $tipo_tareaItems, null, ['class' => 'form-control']) !!}
</div>

<!-- Fecha Fin Field -->
<div class="form-group col-sm-6">
    {!! Form::label('Fecha_fin', 'Fecha límite de finalización:') !!}
    <input class="form-control" type="date" name="Fecha_limite" id="Fecha_limite" required
    value="{{ Carbon\Carbon::now()->format('Y-m-d') }}"
    min="{{ Carbon\Carbon::now()->format('Y-m-d') }}">
</div>

@push('scripts')
    <script type="text/javascript">
        $('#Fecha_limite').datetimepicker({
            format: 'YYYY-MM-DD HH:mm:ss',
            useCurrent: false
        })
    </script>
@endpush

<!-- Prioridad Field -->
<div class="form-group col-sm-6">
    {!! Form::label('Prioridad', 'Prioridad:') !!}
    <select name="prioridad" class="form-control" required>
        <option value="Baja">Baja</option>
        <option value="Media">Media</option>
        <option value="Alta">Alta</option>
      </select>
</div>

<!-- Prioridad Field -->
<div class="form-group col-sm-6">
    {!! Form::label('Predecesora', 'Predecesoras:') !!}
    <select id="SelectPredecesoras" class="form-control" name="Predecesoras[]"  multiple="multiple" required>
        @foreach ($tareas as $item)
            <option value = {{ $item->id }}> {{ $item->Nombre_tarea }} </option>
        @endforeach
    </select>
</div>

<!-- Descripcion Tarea Field -->
<div class="form-group col-sm-12 col-lg-12">
    {!! Form::label('Descripcion_tarea', 'Descripción de la tarea:') !!}
    {!! Form::textarea('Descripcion_tarea', null, ['class' => 'form-control']) !!}
</div>


<!-- Submit Field -->
<div class="form-group col-sm-12">
    {!! Form::submit('Guardar', ['class' => 'btn btn-danger']) !!}
    <a href="javascript:history.back()" class="btn btn-default">Cancelar</a>
</div>













<!-- Fecha Inicio Field
<div class="form-group col-sm-6">
    {!! Form::label('Fecha_inicio', 'Fecha límite de inicio:') !!}
    {!! Form::date('Fecha_inicio', null, ['class' => 'form-control','id'=>'Fecha_inicio']) !!}
</div>

@push('scripts')
    <script type="text/javascript">
        $('#Fecha_inicio').datetimepicker({
            format: 'YYYY-MM-DD HH:mm:ss',
            useCurrent: false
        })
    </script>
@endpush -->

<!-- Valor Field
<div class="form-group col-sm-6">
    {!! Form::label('Valor', 'Valor:') !!}
    {!! Form::number('Valor', null, ['class' => 'form-control']) !!}
</div> -->

<!-- Correcciones Field
<div class="form-group col-sm-6">
    {!! Form::label('Correcciones', 'Correcciones:') !!}
    {!! Form::text('Correcciones', null, ['class' => 'form-control']) !!}
</div> -->

<!-- Proyecto Id Field
<div class="form-group col-sm-6">
    {!! Form::label('Proyecto_id', 'Proyecto Id:') !!}
    {!! Form::select('Proyecto_id', $proyectoItems, null, ['class' => 'form-control']) !!}
</div> -->

<!-- Estado Tarea Id Field
<div class="form-group col-sm-6">
    {!! Form::label('Estado_tarea_id', 'Estado Tarea Id:') !!}
    {!! Form::select('Estado_tarea_id', $estado_tareaItems, null, ['class' => 'form-control']) !!}
</div> -->
