<!-- Personal Id Field -->

@if ($tarea->has_responsable() == false)
    <div class="form-group col-sm-12">
        {!! Form::label('Responsable', 'Responsable:') !!} <br>
        <select id="SelectResponsable" style="width: 100%; height: 100%" class="form-control" name="Responsable"  required>
            @foreach ($personal as $item)
                <option value = {{ $item->id }}> {{ $item->NombrePersonal }} </option>
            @endforeach
        </select>
    </div>
    <br>
@endif

<!-- Colaboradores Field -->
<div class="form-group col-sm-12">
    {!! Form::label('Colaboradores', 'Colaboradores:') !!} <br>
    <select id="SelectColaboradores" style="width: 100%" class="form-control" name="Colaboradores[]"  multiple="multiple">
        @foreach ($personal as $item)
            <option value = {{ $item->id }}> {{ $item->NombrePersonal }} </option>
        @endforeach
    </select>
</div>

<div class="form-group col-sm-12">
    {!! Form::submit('Asignar', ['class' => 'btn btn-danger']) !!}
    <button type="button" class="btn btn-secondary" data-dismiss="modal">Cerrar</button>
</div>
