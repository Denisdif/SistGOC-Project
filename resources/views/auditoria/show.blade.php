@extends('layouts.app')

@section('content')
<div class="content">
<div class="content box box-danger">
    <div class="row justify-content-center">
        <div class="col-md-12">
            <div class="card card-purple card-outline">
                <div class="card-header">
                    <h3>Registro de Auditoria </h3>
                </div>
                <hr>
                <div class="card-body box-profile">
                    <div class="form-group" style="padding-left: 1%">
                        <label for="">ID de la auditoria: </label>
                        {{$auditoria->id}} <br>

                        <label for="">Tabla: </label>
                        {{str_replace(['App\\Models\\', '$', ' '], '', $auditoria->auditable_type)}} <br>

                        <label for="">Usuario:</label>
                        {{$auditoria->user->personal->ApellidoPersonal}} {{$auditoria->user->personal->NombrePersonal}} <br>

                        <label for="">Operacion: </label>
                        {{strtoupper($auditoria->event) }} <br>

                        <label for="">Fecha y Hora: </label>
                        {{$auditoria->created_at->format('d/m/Y - H:i:s')}} <br>
                    </div>
                    <br>
                    <table class="table table-striped table-bordered">
                        <thead>
                            <tr>
                                <th>Campos</th>
                                <th>Datos Nuevos</th>
                                <th>Datos Antiguos</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($auditoria->getModified() as $attribute => $modified)

                            <tr>
                                <td>
                                    {{$attribute}}
                                </td>

                                <td>
                                    @if(!empty($auditoria->new_values))
                                    {{$auditoria->new_values[$attribute]}}
                                    @else
                                    -
                                    @endif
                                </td>

                                <td>
                                    @if(!empty($auditoria->old_values))
                                    {{$auditoria->old_values[$attribute]}}
                                    @else
                                    -
                                    @endif
                                </td>
                            </tr>
                            @endforeach

                        </tbody>
                    </table>
                </div>
                <div class="card-footer d-flex justify-content-around">
                    <form action="{{route('auditoria.historial',$auditoria->id)}}" method="GET">
                        @csrf
                        <button type="submit" class="btn  btn-danger">Ver Historial Completo</button>
                        <a href="javascript:history.back()" class="btn btn-default">Volver</a>
                    </form>

                </div>
            </div>
        </div>
    </div>
</div>
</div>
@endsection
