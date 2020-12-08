@extends('layouts.app')

@section('css')
    @include('layouts.datatables_css')
@endsection

@section('content')
<div class="content">
    <div class="row content box box-danger">
        <div class="col-md-12">
            <div>
                <div class="card-header">
                    <h3>Historial completo de Auditoria </h3>
                </div>
                <hr>
                <div class="">
                    <div class="form-group">
                        <label>Tabla: </label>
                        {{$tabla}}
                    </div>
                    <br>
                    <table class="table table-striped table-bordered" id="data-table">
                        <thead>
                            <tr>
                                <th>ID Auditoria</th>
                                <th>ID Objeto</th>
                                <th>Usuario</th>
                                <th>Operacion</th>
                                <th>Fecha</th>
                                <th>&nbsp; </th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($auditorias as $auditoria)
                            <tr>
                                <td>{{$auditoria->id}}</td>
                                <td>{{$auditoria->auditable_id}}</td>
                                @if (!is_null($auditoria->user))
                                <td>{{$auditoria->user->name .' '.$auditoria->user->apellido  }}</td>

                                @else
                                <td>{{'-1' }}</td>

                                @endif
                                <td>{{$auditoria->event }}</td>
                                @if (!is_null($auditoria->created_at))

                                <td>{{$auditoria->created_at->format('d/m/Y ( H:m:s )') }}</td>
                                @else
                                <td>{{$auditoria->created_at }}</td>

                                @endif
                                @if (is_null($auditoria->id))
                                <td>No existe el usuario en el sistema</td>
                                @else

                                <td>

                                    <form action="{{route('auditoria.show',$auditoria->id)}}">
                                        <button type="submit" name="show" id="{{$auditoria->id}}"
                                            class=" btn btn-outline-info btn-sm">Ver Detalles</button>
                                    </form>
                                </td>
                                @endif

                            </tr>
                            @endforeach

                        </tbody>
                    </table>
                </div>
                <div class="card-footer d-flex justify-content-center">
                    <a href="javascript:history.back()" class="btn btn-default">Volver</a>
                </div>
            </div>
        </div>
    </div>
</div>


@endsection

@section('scripts')

@include('layouts.datatables_js')

<script>


    $(document).ready(function(){
            var table= $('#data-table').DataTable({
                        "language": {
                            "sProcessing":     "Procesando...",
                            "sLengthMenu":     "Mostrar _MENU_ registros",
                            "sZeroRecords":    "No se encontraron resultados",
                            "sEmptyTable":     "Ningún dato disponible en esta tabla =(",
                            "sInfo":           "Mostrando registros del _START_ al _END_ de un total de _TOTAL_ registros",
                            "sInfoEmpty":      "Mostrando registros del 0 al 0 de un total de 0 registros",
                            "sInfoFiltered":   "(filtrado de un total de _MAX_ registros)",
                            "sInfoPostFix":    "",
                            "sSearch":         "Buscar:",
                            "sUrl":            "",
                            "sInfoThousands":  ",",
                            "sLoadingRecords": "Cargando...",
                            "oPaginate": {
                                "sFirst":    "Primero",
                                "sLast":     "Último",
                                "sNext":     "Siguiente",
                                "sPrevious": "Anterior"
                            },
                            "oAria": {
                                "sSortAscending":  ": Activar para ordenar la columna de manera ascendente",
                                "sSortDescending": ": Activar para ordenar la columna de manera descendente"
                            },
                            "buttons": {
                                "copy": "Copiar",
                                "colvis": "Visibilidad"
                            }

                        }


                    });
        });

</script>
@endsection
