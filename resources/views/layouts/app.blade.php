<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8">
    <title>SistGOC</title>
    <meta name="csrf-token" content="{{ csrf_token() }}"/>
    <meta content='width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no' name='viewport'>

    <!-- Bootstrap 3.3.7 -->
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://gitcdn.github.io/bootstrap-toggle/2.2.2/css/bootstrap-toggle.min.css">
    <!-- Font Awesome -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">

    <!-- Theme style -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/admin-lte/2.4.3/css/AdminLTE.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/admin-lte/2.4.3/css/skins/_all-skins.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/select2/4.0.2/css/select2.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/admin-lte/2.3.3/css/skins/_all-skins.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-daterangepicker/2.1.24/daterangepicker.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/sweetalert/1.1.3/sweetalert.min.css">
    <!-- Ionicons -->
    <link rel="stylesheet" href="https://code.ionicframework.com/ionicons/2.0.1/css/ionicons.min.css">
    <link rel="stylesheet" href="{{asset('css/style.css')}}">

    <link href="https://cdn.jsdelivr.net/npm/select2@4.1.0-beta.1/dist/css/select2.min.css" rel="stylesheet" />
    <script src="https://cdn.jsdelivr.net/npm/select2@4.1.0-beta.1/dist/js/select2.min.js"></script>
    @yield('css')
</head>

<body  class="skin-red sidebar-mini">
@if (!Auth::guest())
    <div class="wrapper">
        <!-- Main Header -->
        <header class="main-header">

            <!-- Logo -->
            <a style="position: fixed" href="#" class="logo">
                <b>SistGOC</b>
            </a>

            <!-- Header Navbar -->
            <nav class="navbar navbar-fixed-top" role="navigation">
                <!-- Sidebar toggle button -->
                <a href="javascript:history.back()" class="btn" style="padding-top: 1%"><i class="icon-arrow-left " style="color: aliceblue"></i></a>
                <!-- Navbar Right Menu -->
                <div class="navbar-custom-menu">
                    <ul class="nav navbar-nav">
                        <!-- User Account Menu -->
                        <li class="dropdown user user-menu">
                            <!-- Menu Toggle Button -->
                            <a href="#" class="dropdown-toggle" data-toggle="dropdown">
                                <!-- The user image in the navbar-->
                                <img src="{{ Auth::user()->image_path }}" alt="" class="user-image">
                                <span class="pr-3 align-middle">{!! Auth::user()->name !!}</span>
                            </a>
                            <ul class="dropdown-menu">
                                <!-- The user image in the menu -->
                                <li class="user-header">
                                    <img src="{{ Auth::user()->image_path }}" class="img-circle" alt="User Image">
                                    <p>
                                        {!! Auth::user()->name !!}
                                        <small>Usuario del sistema desde {!! Auth::user()->created_at->format('M. Y') !!}</small>
                                    </p>
                                </li>
                                <!-- Menu Footer-->
                                <li class="user-footer">
                                    <div class="pull-left">
                                        <!--<a href="{!! url('profile') !!}"
                                           class="btn btn-default btn-flat" style="border-radius: 5px !important;">Profile</a>-->
                                    </div>
                                    <div class="text-center">
                                        <a href="{!! url('/logout') !!}" class="btn btn-default btn-flat"
                                            onclick="event.preventDefault(); document.getElementById('logout-form').submit();">
                                            Cerrar sesión
                                        </a>
                                        <form id="logout-form" action="{{ url('/logout') }}" method="POST" style="display: none;">
                                            {{ csrf_field() }}
                                        </form>
                                    </div>
                                </li>
                            </ul>
                        </li>
                    </ul>
                </div>
            </nav>
        </header>

        <!-- Left side column. contains the logo and sidebar -->
        @include('layouts.sidebar')
        <!-- Content Wrapper. Contains page content -->
        <div class="content-wrapper" style="background-image: url('/images/Captura.jpg'); background-size: 100%; background-opacity: 0.5">
            <br>
            <br>
            @yield('content')
        </div>

        <!-- Main Footer
        <footer class="main-footer" style="max-height: 100px;text-align: center">
            <strong>Copyright © {{date('Y')}} <a href="#">Company</a>.</strong> All rights reserved.
        </footer>-->

    </div>
@else
    <nav class="navbar navbar-default navbar-static-top">
        <div class="container">
            <div class="navbar-header">

                <!-- Collapsed Hamburger -->
                <button type="button" class="navbar-toggle collapsed" data-toggle="collapse"
                        data-target="#app-navbar-collapse">
                    <span class="sr-only">Toggle Navigation</span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                </button>

                <!-- Branding Image -->
                <a class="navbar-brand" href="{!! url('/') !!}">
                    {{ config('app.name') }}
                </a>
            </div>

            <div class="collapse navbar-collapse" id="app-navbar-collapse">
                <!-- Left Side Of Navbar -->
                <ul class="nav navbar-nav">
                    <li><a href="{!! url('/home') !!}">Home</a></li>
                </ul>

                <!-- Right Side Of Navbar -->
                <ul class="nav navbar-nav navbar-right">
                    <!-- Authentication Links -->
                    <li><a href="{!! url('/login') !!}">Login</a></li>
                    <li><a href="{!! url('/register') !!}">Register</a></li>
                </ul>
            </div>
        </div>
    </nav>

    <div id="page-content-wrapper">
        <div class="container-fluid">
            <div class="row">
                <div class="col-lg-12">
                    @yield('content')
                </div>
            </div>
        </div>
    </div>
    @endif

    <script src="https://cdn.jsdelivr.net/npm/select2@4.1.0-beta.1/dist/js/select2.min.js"></script>
<!-- DataTables Youtube -->
    <script src=  https://code.jquery.com/jquery-3.5.1.js ></script>
    <script src=  https://cdn.datatables.net/1.10.22/js/jquery.dataTables.min.js ></script>
    <script src= https://cdn.datatables.net/1.10.22/js/dataTables.bootstrap4.min.js ></script>

    <!-- jQuery 3.1.1 -->
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/moment.js/2.15.1/moment.min.js"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-datetimepicker/4.17.47/js/bootstrap-datetimepicker.min.js"></script>
<script src="https://gitcdn.github.io/bootstrap-toggle/2.2.2/js/bootstrap-toggle.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery-toast-plugin/1.3.2/jquery.toast.min.js"></script>
<!-- AdminLTE App -->
<script src="https://cdnjs.cloudflare.com/ajax/libs/admin-lte/2.4.3/js/adminlte.min.js"></script>

<script src="https://cdnjs.cloudflare.com/ajax/libs/iCheck/1.0.2/icheck.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/select2/4.0.5/js/select2.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/sweetalert/1.1.3/sweetalert.min.js"></script>

<!-- Graficos -->
<script src="https://cdn.jsdelivr.net/npm/chart.js@2.9.4/dist/Chart.min.js"></script>


<script>
    $(document).ready(function() {
        $('#Nose').DataTable({
            "paging": true,
            "lengthChange": true,
            "searching": true,
            "ordering": true,
            "info": false,
            "autoWidth": false,
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
        $('#AmbientesDelProyecto').DataTable({
            "paging": true,
            "lengthChange": true,
            "searching": true,
            "ordering": true,
            "info": false,
            "autoWidth": false,
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
        $('#TareasDelProyecto').DataTable({
            "paging": true,
            "lengthChange": true,
            "searching": true,
            "ordering": true,
            "info": false,
            "autoWidth": false,
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
        $('#PersonalDelProyecto').DataTable({
            "paging": true,
            "lengthChange": true,
            "searching": true,
            "ordering": true,
            "info": false,
            "autoWidth": false,
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
        $('#Proyectos').DataTable({
            "paging": true,
            "lengthChange": true,
            "searching": true,
            "ordering": true,
            "info": false,
            "autoWidth": false,
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
        $('#Comentarios').DataTable({
            "paging": true,
            "lengthChange": true,
            "searching": true,
            "ordering": true,
            "info": false,
            "autoWidth": false,
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
        $('#Entregas').DataTable({
            "paging": true,
            "lengthChange": true,
            "searching": true,
            "ordering": true,
            "info": false,
            "autoWidth": false,
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

        $('.datatables').DataTable({
            "paging": true,
            "lengthChange": true,
            "searching": true,
            "ordering": true,
            "info": false,
            "autoWidth": false,
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
          $('#Personal2').DataTable({
            "paging": true,
            "lengthChange": true,
            "searching": true,
            "ordering": true,
            "info": false,
            "autoWidth": false,
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
          $('#Personal3').DataTable({
            "paging": true,
            "lengthChange": true,
            "searching": true,
            "ordering": true,
            "info": false,
            "autoWidth": false,
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
        $('.Modal_1').click(function(){
            $('#resultado').val($(this).attr('id'));
            $('.modal').modal("show");
    });
    });
</script>

<script>
    $(document).ready(function(){
        $('#TipoComitente').change(function(){
            Tipo = $('#TipoComitente').val();
            if (Tipo==1) {
                $('.Nombre2').removeAttr('style','display: none');
                $('.Nombre').attr('style','display: none');
                $('#EtiquetaOcultaSexo').removeAttr('style','display: none');
                $("#CampoOcultoSexo").val("");
                $('#CampoOcultoSexo').removeAttr('style','display: none');
                $('#EtiquetaOcultaApellido').removeAttr('style','display: none');
                $("#CampoOcultoApellido").val("");
                $('#CampoOcultoApellido').removeAttr('style','display: none');

            }else{
                $('.Nombre').removeAttr('style','display: none');
                $('.Nombre2').attr('style','display: none');
                $('#EtiquetaOcultaSexo').attr('style','display: none');
                $("#CampoOcultoSexo").val("");
                $('#CampoOcultoSexo').attr('style','display: none');
                $('#EtiquetaOcultaApellido').attr('style','display: none');
                $("#CampoOcultoApellido").val("");
                $('#CampoOcultoApellido').attr('style','display: none');

            };
        });
    });
</script>

<script>
    $(document).ready(function(){
        $('#CargarComitente').on('click',function(){
            $('#esconder').removeAttr('style','display: none');
            $('#divComitente2').removeAttr('style','display: none');
            $('#divComitente1').attr('style','display: none');
            $('#SelectComitente').val("");
            $('#SelectComitente').attr('disabled',true);
        });
    });
</script>

<script>
    $(document).ready(function(){
        $('#SeleccionarComitente').on('click',function(){
            $('#esconder').attr('style','display: none');
            $('#divComitente2').attr('style','display: none');
            $('#divComitente1').removeAttr('style','display: none');
            $('#SelectComitente').removeAttr('disabled');
        });
    });
</script>

<script>
    $(document).ready(function(){
        $('#crearTarea').on('click',function(){
            $('#esconder').removeAttr('style','display: none');
            $('#mostrar').attr('style','display: none');
        });
    });
</script>

<script>
    $(document).ready(function(){
        $('#buscarTarea').on('click',function(){
            $('#esconder').attr('style','display: none');
            $('#mostrar').removeAttr('style','display: none');
            $('#nombre').val('');
        });
    });
</script>

<script>
    $(document).ready(function(){
        $('#Tipo_tarea_id').change(function(){
            $('#Nombre_tarea').removeAttr('disabled');
            var id = $(this).val();
            var url = "{{ route('tareas.obtenerTareas', ":id") }}" ;
            url = url.replace(':id' , id) ;
            $.get(url, function(data){
                var html_select = '<option value="" selected disabled>--Seleccione--</option>' ;
                for(var i = 0 ; i<data.length ; i++){
                    html_select += '<option value="'+data[i].id+'">'+data[i].Nombre_tarea+'</option>' ;
                }
                $('#Nombre_tarea').html(html_select);
            });
        });
    }) ;
</script>

<script>
    $(document).ready(function(){
        $('#pais_id').change(function(){
            $('#provincia_id').removeAttr('disabled');
            var id = $(this).val();
            var url = "{{ route('paises.obtenerProvincias', ":id") }}" ;
            url = url.replace(':id' , id) ;
            $.get(url, function(data){
                var html_select = '<option value="" selected disabled>--Seleccione--</option>' ;
                for(var i = 0 ; i<data.length ; i++){
                    html_select += '<option value="'+data[i].id+'">'+data[i].provincia+'</option>' ;
                }
                $('#provincia_id').html(html_select);
            });
        });
        $('#provincia_id').change(function(){
            $('#localidad_id').removeAttr('disabled');
            var id = $(this).val();
            var url = "{{ route('provincias.obtenerLocalidades', ":id") }}" ;
            url = url.replace(':id' , id) ;
            $.get(url, function(data){
                var html_select = '<option value="" selected disabled>--Seleccione--</option>' ;
                for(var i = 0 ; i<data.length ; i++){
                    html_select += '<option value="'+data[i].id+'">'+data[i].localidad+'</option>' ;
                }
                $('#localidad_id').html(html_select);
            });
        });
    }) ;
</script>

<script>
    $(document).ready(function() {
        $('#SelectComitente').select2();
        $('#SelectColaboradores').select2();
        $('#SelectResponsable').select2();
        $('#SelectPredecesoras').select2();
        $('#Nombre_tarea').select2();
        $('#Ambiente_id').select2();
    });
</script>

<script>
    $('.addRow').on('click',function(){
        addRow();
    });
    function addRow(){
        //Obtener los valores de los inputs
        Ambiente_id = $('#Ambiente_id').val() ;
        Ambiente = $("#Ambiente_id option:selected").text();
        Cantidad = $("#Cantidades").val();
            if(Ambiente_id != null ){
                if(Cantidad > 0){
                // if(precio > 0){
                    var fila = '<tr> <td><input type="hidden" name="Ambiente_id[]" value="'+Ambiente_id+'">'+Ambiente+'</td>'+
                                '<td style="text-align:right;"><input type="hidden" name="Cantidad[]" value="'+Cantidad+'">'+Cantidad+' </td>'+
                                '<td style="text-align:center;"><a href="#" class="btn btn-danger btn-xs remove"><i class="fas fa-minus"></i></a></td>' +
                                '</tr>' ;
                    $('.ColaCarga').append(fila) ;
                    limpiar();
                // }else{
                //     swal({
                //         title: "Error",
                //         text: "Ingrese un precio valido y mayor a 0",
                //         icon: "error",
                //     });
                // }
                }else{
                    swal({
                        title: "Error",
                        text: "Ingrese una cantidad valida y mayor a 0",
                        icon: "error",
                    });
                }
            }else{
                swal({
                    title: "Error",
                    text: "Seleccione un ambiente",
                    icon: "error",
                });
        }
    }
    function limpiar(){
		$("#Ambiente_id").val("");
		$("#Cantidad").val("1");
	}
    $('body').on('click', '.remove',function(){
        // var last=$('tbody tr').length;
        // if(last==1){
        //     alert("No es posible eliminar la ultima fila");
        // }
        // else{
            $(this).parent().parent().remove();
        //}
    });
</script>

{{-- Filtro auditoria

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
--}}





@yield('datatable_js')
@yield('page_js')
@yield('page_scripts')
<script src="{{ asset('assets/users/user.js') }}"></script>
<script src="{{asset('assets/admin-lte/plugins/moment/moment-with-locales.min.js')}}"></script>
<script>
  let loggedInUserId = "{{ getLoggedInUserId() }}";
  let baseUrl = "{{url('/')}}/";
</script>
@yield('scripts')
<script src="{{asset('js/custom.js')}}" type="text/javascript"></script>
</body>
</html>
