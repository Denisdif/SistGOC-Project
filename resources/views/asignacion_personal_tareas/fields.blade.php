<!-- Personal Id Field -->

@if ($tarea->has_responsable() == false)
    <div class="form-group col-sm-12">
        {!! Form::label('Responsable', 'Responsable:') !!} <br>
        <select id="SelectResponsable" style="width: 100%; height: 100%" class="form-control" name="Responsable"  required>
            @foreach ($personal as $item)
                @if (($item->User->rol->NombreRol == "Desarrollador") and ($item->Activo == NULL))
                    <option value = {{ $item->id }}>{{ $item->ApellidoPersonal }} {{ $item->NombrePersonal }} </option>
                @endif
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
            @if (($item->User->rol->NombreRol == "Desarrollador") and ($item->Activo == NULL))
                <option value = {{ $item->id }}>{{ $item->ApellidoPersonal }} {{ $item->NombrePersonal }} </option>
            @endif
        @endforeach
    </select>
</div>
