<!-- Personal Id Field -->
<div class="form-group col-sm-12">
    {!! Form::label('Personal_id', 'Empleado:') !!}
    {!! Form::select('Personal_id', $personalItems, old('Personal_id'), ['class' => 'form-control']) !!}
</div>

<!-- Responsabilidad Field
<div class="form-group col-sm-12">
    {!! Form::label('Responsabilidad', 'Responsabilidad:') !!}
    <select disabled name="Responsabilidad" class = 'form-control' value="{{ old('Responsabilidad') }}">
        <option selected value="Desarrollador">Desarrollador</option>
        <option value="Aprobador">Aprobador</option>
        <option value="Supervisor">Supervisor</option>
    </select>
</div> -->

<!-- Tarea Id Field
<div class="form-group col-sm-6">
    {!! Form::label('Tarea_id', 'Tarea Id:') !!}
    {!! Form::select('Tarea_id', $tareaItems, null, ['class' => 'form-control']) !!}
</div> -->

<!-- Submit Field -->

