@extends('layouts.app')

@section('content')

@section('css')
    @include('layouts.datatables_css')
@endsection
<div class="content">

<div class="card box box-danger content">

    <section class="content-header">
        <h1 class="pull-left">Auditoria</h1>
        <h1 class="pull-right">

        {!! Form::open(['route' => 'auditoria.pdf', 'form-inline pull-right']) !!}

            <div style="display: none">
                <div class=" col-sm-12">
                    <label for="">Tabla</label>
                    <input type="text" name="tabla" value="{{ $tabla }}" class="form-control">
                </div>

                <div class=" col-sm-12">
                    <label for="">Usuario</label>
                    <input type="number" name="user_id" value="{{ $user_id }}" class="form-control">
                </div>

                <div class="col-md-6">
                    <div class="form-group">
                        <label>Desde</label>
                        <input type="date" id="min" name="desde" value="{{ $desde }}" class="form-control">
                    </div>
                </div>
                <div class="col-md-6">
                    <div class="form-group">
                        <label>Hasta</label>
                        <input type="date" id="max" name="hasta" value="{{ $hasta }}" class="form-control">
                    </div>
                </div>
            </div>

            <button class="btn btn-secundary" data-toggle="modal" data-target="#Filtrar" type="button">Filtrar</button>
            <button class="btn btn-secundary" type="submit" >PDF</button>

        {!! Form::close() !!}

        </h1>
    </section>

    <br><hr>
    <div class="card-body content">

        <div class="table-responsive table-sm">
            <table id="auditorias" class="table table-bordered table-striped table-hover datatable">
                <thead>
                    <tr>
                        <th>Nº</th>
                        <th>Tabla</th>
                        <th>Operacion</th>
                        <th>Fecha</th>
                        <th>Hora</th>
                        <th>Usuario</th>
                        <th>Accion</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($auditorias as $auditoria)
                    <tr>
                        <td>{{$auditoria->auditable_id}}</td>
                        <td>{{ str_replace(['App\\Models\\', '$', ' '], '', $auditoria->auditable_type)}}</td>
                        <td style="text-transform:uppercase">{{$auditoria->event}}</td>
                        <td>{{$auditoria->created_at->format('d/m/Y')}}</td>
                        <td>{{$auditoria->created_at->format('H:i:s')}}</td>
                        <td>{{$auditoria->user->personal->ApellidoPersonal}} {{$auditoria->user->personal->NombrePersonal}}</td>

                        <td>
                            <form action="{{route('auditoria.show',$auditoria->id)}}">
                                <button type="submit" name="show" id="{{$auditoria->id}}"
                                    class=" btn btn-outline-info btn-sm">Ver Detalles</button>
                            </form>
                        </td>
                    </tr>

                    @endforeach
                    {{--
                        @foreach($auditoriasUser as $auditoria)
                        <tr>
                            <td>{{$auditoria->auditable_id}}</td>
                            <td>EMPLEADOS</td>
                            <td style="text-transform:uppercase">{{$auditoria->event}}</td>
                            <td>{{$auditoria->created_at->format('d/m/Y')}}</td>
                            <td>{{$auditoria->created_at->format('H:i:s')}}</td>
                            <td>{{$auditoria->user->apellido}} {{$auditoria->user->name}}</td>
                            <td width="150px" class="text-center">


                                <a href="{{route('auditoria.showUser' , ['auditoria' => $auditoria->auditable_id, 'id' => $auditoria->id])}}"
                                    class="btn btn-xs btn-primary">Ver
                                    mas</a>

                            </td>
                        </tr>

                        @endforeach--}}
                        {{--@foreach($auditoriasProd as $auditoria)
                        <tr>
                            <td>{{$auditoria->auditable_id}}</td>
                            <td>PRODUCTOS</td>
                            <td style="text-transform:uppercase">{{$auditoria->event}}</td>
                            <td>{{$auditoria->created_at->format('d/m/Y')}}</td>
                            <td>{{$auditoria->created_at->format('H:i:s')}}</td>
                            <td>{{$auditoria->user->apellido}} {{$auditoria->user->name}}</td>
                            <td width="150px" class="text-center">


                                <a href="{{route('auditoria.showProd' , ['auditoria' => $auditoria->auditable_id, 'id' => $auditoria->id])}}"
                                    class="btn btn-xs btn-primary">Ver
                                    mas</a>

                            </td>
                        </tr>

                        @endforeach--}}
                        {{--@foreach($auditoriasRec as $auditoria)
                        <tr>
                            <td>{{$auditoria->auditable_id}}</td>
                            <td>RECLAMOS</td>
                            <td style="text-transform:uppercase">{{$auditoria->event}}</td>
                            <td>{{$auditoria->created_at->format('d/m/Y')}}</td>
                            <td>{{$auditoria->created_at->format('H:i:s')}}</td>
                            <td>{{$auditoria->user->apellido}} {{$auditoria->user->name}}</td>
                            <td width="150px" class="text-center">

                                <a href="{{route('auditoria.showRec' , ['auditoria' => $auditoria->auditable_id, 'id' => $auditoria->id])}}"
                                    class="btn btn-xs btn-primary">Ver
                                    mas</a>

                            </td>
                        </tr>

                        @endforeach
                    --}}
                </tbody>
            </table>
        </div>
    </div>
</div>



<div id="Filtrar" class="modal" tabindex="-1" role="dialog">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header" style="background-color: rgb(223, 43, 61)">
                <h5 class="modal-title"> <b style="color: white"> Filtrar auditorías </b>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button></h5>
            </div>
            <div class="modal-body">
                <div class="row">
                    {!! Form::open(['route' => 'auditoria.index', 'method' => 'GET', 'form-inline pull-right']) !!}

                        <div class=" col-sm-12">
                            <label for="">Tabla</label>
                            <select name="tabla" id="tabla" class="form-control" data-placeholder="Seleccione Una Tabla" style="width: 100%;">
                                <option value="" selected disabled>--Seleccione--</option>
                                @foreach ($modelosAuditoria as $modela)
                                    <option value="{{$modela}}">{{$modela}}</option>
                                @endforeach
                            </select>
                            <br>
                        </div>

                        <div class=" col-sm-12">
                            <label for="">Usuario</label>
                            <select name="user_id" id="user" class="form-control">
                                <option value="" selected disabled>--Seleccione--</option>
                                @foreach ($usuarios as $user)
                                    <option value="{{$user->id}}">{{$user->personal->ApellidoPersonal}} {{$user->personal->NombrePersonal}}</option>
                                @endforeach
                            </select>
                            <br>
                        </div>

                        <div class="col-md-6">
                            <div class="form-group">
                                <label>Desde</label>
                                <input type="date" id="min" name="desde" value="" class="form-control">
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group">
                                <label>Hasta</label>
                                <input type="date" id="max" name="hasta" value="" class="form-control">
                            </div>
                        </div>
                </div>
            </div>
            <div class="modal-footer">
                <button type="submit" class="btn btn-danger">Filtrar</button>
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Cerrar</button>
            {!! Form::close() !!}
            </div>
        </div>
    </div>
</div>
</div>
@section('scripts')

    @include('layouts.datatables_js')

    <script>
        $(function () {
            $('#auditorias').DataTable({
                "order": [[ 3, "desc" ] , [4 , 'desc']] ,
                    language: {
                        "decimal": "",
                        "emptyTable": "No hay información",
                        "info": "Mostrando _START_ a _END_ de _TOTAL_ Entradas",
                        "infoEmpty": "Mostrando 0 to 0 of 0 Entradas",
                        "infoFiltered": "(Filtrado de _MAX_ total entradas)",
                        "infoPostFix": "",
                        "thousands": ",",
                        "lengthMenu": "Mostrar _MENU_ Entradas",
                        "loadingRecords": "Cargando...",
                        "processing": "Procesando...",
                        "search": "Buscar:",
                        "zeroRecords": "Sin resultados encontrados",
                        "paginate": {
                            "first": "Primero",
                            "last": "Ultimo",
                            "next": "Siguiente",
                            "previous": "Anterior"
                        }
                    },
            });
            });
    </script>

    <script>
        @if(session('confirmar'))
            Confirmar.fire() ;
        @elseif(session('cancelar'))
            Cancelar.fire();
        @elseif(session('borrado'))
            Borrado.fire();
        @endif
    </script>


    <script>
        $(document).ready(function() {
        var table = $('#auditorias').DataTable();
        $('#limpiar').click(function(){
            $("#tabla ").prop("selectedIndex", 0) ;
            $("#user ").prop("selectedIndex", 0) ;
            $('input[type=date]').val('');
            $.fn.dataTable.ext.search.pop(
                function( settings, data, dataIndex ) {
                    if(1){
                        return true ;
                    }
                    return false ;
                }
            );
            table.draw() ;
        }) ;
        $('#filtrar').click(function(){
            var fec1 =  $('#min').val() ;
            var fec2 =  $('#max').val() ;
            var filtro1 = $('#tabla').val() ;
            var filtro2 = $('#user').val() ;
            $.fn.dataTable.ext.search.pop(
                function( settings, data, dataIndex ) {
                    if(1){
                        return true ;
                    }
                    return false ;
                }
            );
            table.draw() ;
            if(filtro1 != null){
                var tabla = $('#tabla option:selected').text() ;
            }
            if(filtro2 != null){
                var user = $('#user option:selected').text() ;
            }
            if((fec1 != "") && (fec2 != "")){
                var filtradoTabla = function FuncionFiltrado(settings, data, dataIndex){
                    var min = moment(fec1) ;
                    var max = moment(fec2) ;
                    var d = data[3]
                    var datearray = d.split("/");
                    var newdate =   datearray[2] + '/'+ datearray[1] + '/' + datearray[0] ;
                    var s = new Date(newdate)
                    var startDate = moment(s)
                    if(filtro1 == null && filtro2 == null){
                        if  (
                                ( min == "" || max == "" ) ||
                                (
                                    (moment(startDate).isSameOrAfter(min) && moment(startDate).isSameOrBefore(max) )
                                )
                            )
                        {
                            return true ;
                        }else{
                            return false;
                        }
                    }else if(filtro1 != null && filtro2 != null){
                        if  (
                                ( min == "" || max == "" ) ||
                                (
                                    (moment(startDate).isSameOrAfter(min) && moment(startDate).isSameOrBefore(max) ) &&
                                    (tabla == data[1]) &&
                                    (user == data[5])
                                )
                            )
                        {
                            return true ;
                        }else{
                            return false;
                        }
                    }else if(filtro1 != null && filtro2 == null){
                        if  (
                                ( min == "" || max == "" ) ||
                                (
                                    (moment(startDate).isSameOrAfter(min) && moment(startDate).isSameOrBefore(max) ) &&
                                    (tabla == data[1])
                                )
                            )
                        {
                            return true ;
                        }else{
                            return false;
                        }
                    } else if(filtro1 == null && filtro2 != null){
                        if  (
                                ( min == "" || max == "" ) ||
                                (
                                    (moment(startDate).isSameOrAfter(min) && moment(startDate).isSameOrBefore(max) ) &&
                                    (user == data[5])
                                )
                            )
                        {
                            return true ;
                        }else{
                            return false;
                        }
                    }
                }
                $.fn.dataTable.ext.search.push( filtradoTabla )
                table.draw()
            }else if(filtro1 != null && filtro2 == null){
                var filtradoTabla = function FuncionFiltrado(settings, data, dataIndex){
                    if  ( tabla == data[1]){
                        return true ;
                    }else{
                        return false;
                    }
                }
                $.fn.dataTable.ext.search.push( filtradoTabla )
                table.draw()
            }else if(filtro1 == null && filtro2 != null){
                var filtradoTabla = function FuncionFiltrado(settings, data, dataIndex){
                    if (user == data[5]) {
                        return true ;
                    }else{
                        return false;
                    }
                }
                $.fn.dataTable.ext.search.push( filtradoTabla )
                table.draw()
            }else if(filtro1 != null && filtro2 != null){
                var filtradoTabla = function FuncionFiltrado(settings, data, dataIndex){
                    if(user == data[5] && tabla == data[1]){
                        return true ;
                    } else{
                        return false ;
                    }
                }
                $.fn.dataTable.ext.search.push( filtradoTabla )
                table.draw()
            }else{
                swal({
                title: "Alerta",
                text: "Seleccione opciones de filtrado!",
                });
            }
        }) ;
    } );
    </script>

@endsection
@endsection



{{--
    <section class="content-header">
        <h1 class="pull-left">Filtros</h1>
    </section>

    <br><hr>
    <div>
        <form  class="form-group" method="GET" action="{{route('auditoria.pdf')}}">
            <div style="padding: 1%" class="row d-flex justify-content-around">
                <div class=" col-sm-3">
                    <label for="">Tabla</label>
                    <select name="tabla" id="tabla" class="form-control" data-placeholder="Seleccione Una Tabla" style="width: 100%;">
                        <option value="" selected disabled>--Seleccione--</option>
                        @foreach ($modelosAuditoria as $modela)
                        <option value="{{$modela}}">{{$modela}}</option>

                        @endforeach

                    </select>
                </div>
                <div class=" col-sm-3">
                    <label for="">Usuario</label>
                    <select name="empleado_id" id="user" class="form-control">
                        <option value="" selected disabled>--Seleccione--</option>
                        @foreach ($usuarios as $user)
                            <option value="{{$user->id}}">{{$user->personal->ApellidoPersonal}} {{$user->personal->NombrePersonal}}</option>
                        @endforeach

                    </select>
                </div>
                <div class="col-md-3">
                    <div class="form-group">
                        <label>Desde</label>
                        <input type="date" id="min" name="fecha1" value="" class="form-control">
                    </div>
                </div>
                <div class="col-md-3">
                    <div class="form-group">
                        <label>Hasta</label>
                        <input type="date" id="max" name="fecha2" value="" class="form-control">
                    </div>
                </div>


                 <div class="col-md-1">
                    <button type="submit" class="btn btn-xs btn-danger ">Generar <i class="fa fa-file-pdf"></i></button>
                </div>
            </div>
            <br>
            <div class="row" style="padding-left: 2%">
                <button type="button" class="btn btn-danger" id="filtrar">Filtrar </button>
                <button type="submit" class="btn btn-danger ">PDF</button>
                <button type="button" class="btn btn-danger" id="limpiar">Limpiar </button>
            </div>
            <br>
    </div> --}}
