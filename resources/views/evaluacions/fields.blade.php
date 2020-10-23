<!-- Evaluador Id Field
<div class="form-group col-sm-6">
    {!! Form::label('Evaluador_id', 'Evaluador Id:') !!}
    {!! Form::number('Evaluador_id', null, ['class' => 'form-control']) !!}
</div> -->

<!-- Personal Id Field
<div class="form-group col-sm-6">
    {!! Form::label('Personal_id', 'Personal Id:') !!}
    {!! Form::select('Personal_id', $personalItems, null, ['class' => 'form-control']) !!}
</div> -->

<!-- Fecha Inicio Field -->
<div class="form-group col-sm-6">
    {!! Form::label('Fecha_inicio', 'Fecha Inicio:') !!}
    {!! Form::date('Fecha_inicio', null, ['class' => 'form-control','id'=>'Fecha_inicio']) !!}
</div>

@push('scripts')
    <script type="text/javascript">
        $('#Fecha_inicio').datetimepicker({
            format: 'YYYY-MM-DD HH:mm:ss',
            useCurrent: false
        })
    </script>
@endpush

<!-- Fecha Fin Field -->
<div class="form-group col-sm-6">
    {!! Form::label('Fecha_fin', 'Fecha Fin:') !!}
    {!! Form::date('Fecha_fin', null, ['class' => 'form-control','id'=>'Fecha_fin']) !!}
</div>

@push('scripts')
    <script type="text/javascript">
        $('#Fecha_fin').datetimepicker({
            format: 'YYYY-MM-DD HH:mm:ss',
            useCurrent: false
        })
    </script>
@endpush

<!-- Submit Field -->
<div class="form-group col-sm-12">
    {!! Form::submit('Save', ['class' => 'btn btn-primary']) !!}
    <a href="{{ route('evaluacions.index') }}" class="btn btn-default">Cancel</a>
</div>
