@extends('admin_panel.index')

@section('content')
<div class="content-fluid">
    <div class="row  justify-content-center">
        <div class="col-md-12">
            <div class="card card-purple card-outline">
                <div class="card-header">
                    <h3>Registro de Auditoria </h3>
                </div>
                <div class="card-body box-profile">
                    <div class="row">
                        <div class="col-md-4">
                            <div class="row">
                                <label for="">ID de la auditoria </label>
                                <p>{{': '.$auditoria->id}}</p>
                            </div>

                        </div>
                        <div class="col-md-4">
                            <div class="row">
                                <label for="">Tabla </label>
                                <p>{{': '.str_replace(['App\\', '$', ' '], '', $auditoria->auditable_type)}}</p>
                            </div>

                        </div>
                        <div class="col">
                            <div align="right">

                                <form action="{{route('pdf.auditoriaUnObjeto',$auditoria->id)}}" method="GET">
                                    @csrf
                                    <button type="submit" class="btn  btn-success  btn-flat btn-sm text-white">Crear
                                        Reporte Completo</button>
                                </form>

                            </div>
                        </div>

                    </div>
                    <div class="row">
                        <div class="col-md-4">
                            <div class="row">

                                <label for="">Usuario</label>
                                <p>{{': '}}{{$auditoria->user->apellido ?? 'Sin Apellido'}}
                                    {{', '}}{{$auditoria->user->name ?? 'Sin Nombre'}}</p>
                            </div>
                        </div>
                        <div class="col-md-4">
                            <div class="row">

                                <label for="">Operacion</label>
                                <p>{{': '. strtoupper($auditoria->event) }}</p>
                            </div>
                        </div>
                        <div class="col-md-4">
                            <div class="row">

                                <label for="">Fecha y Hora</label>
                                <p>{{': '.$auditoria->created_at->format('d/m/Y - H:i:s')}}</p>
                            </div>
                        </div>
                    </div>

                    <br>
                    <table class="table">
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
                        <button type="submit" class="btn  btn-success  btn-flat btn-sm text-white">Ver
                            Historial
                            Completo</button>
                    </form>
                    <a href="javascript:history.back()" class="btn btn-primary btn-sm">Volver</a>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection