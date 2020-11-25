@extends('layouts.app')

@section('content')

{{-- <div class="card">
    <div class="card-header p-2">
        <ul class="nav nav-pills">
                <li class="nav-item"><a class="nav-link active" href="#activity" data-toggle="tab">Activity</a></li>
                <li class="nav-item"><a class="nav-link" href="#timeline" data-toggle="tab">Timeline</a></li>
                <li class="nav-item"><a class="nav-link" href="#settings" data-toggle="tab">Settings</a></li>
        </ul>
    </div>
    <div class="card-body">
        <div class="tab-content">
            <div class=" active tab-pane" id="activity">
                je
            </div>
            <div class="tab-pane">
jo
            </div>
        </div>
    </div>
</div> --}}

<div class="box box-danger">

<div class="card">
    <div class="card-header">
        <h3>Configuracion del Sistema</h3>
    </div>
    <div class="card-body">
        <ul class="nav nav-tabs" id="myTab" role="tablist">
            <li class="nav-item">
                <a class="nav-link active" id="home-tab" data-toggle="tab" href="#home" role="tab" aria-controls="home"
                    aria-selected="true">General</a>
            </li>
            <li class="nav-item">
                <a class="nav-link" id="comprobantes-tab" data-toggle="tab" href="#comprobantes" role="tab"
                    aria-controls="comprobantes" aria-selected="false">Tipos de Comprobantes</a>
            </li>
            <li class="nav-item">
                <a class="nav-link" id="movimientos-tab" data-toggle="tab" href="#movimientos" role="tab"
                    aria-controls="movimientos" aria-selected="false">Tipos de Movimientos</a>
            </li>
            <li class="nav-item">
                <a class="nav-link" id="zonas-tab" data-toggle="tab" href="#zonas" role="tab" aria-controls="zonas"
                    aria-selected="false">Zonas</a>
            </li>
        </ul>
        <div class="tab-content" id="myTabContent">
            <div class="tab-pane fade show active" id="home" role="tabpanel" aria-labelledby="home-tab">
                <br>
                <div class="row d-flex justify-content-end">
                    <a href="#" id="editar">Editar <i class="fal fa-edit"></i></a>
                </div>
                <form class="form-group " method="POST" action="{{route('PDFconfig.update')}}"
                    enctype="multipart/form-data">
                    @method('PUT')
                    <div class="form-group">
                        <label for="">Nombre de la Empresa</label>
                        <input type="text" disabled class="form-control" name="nombre" id="nombre"
                            {{-- value="{{$config->nombre}}"--}}>
                    </div>
                    <div class="form-group">
                        <label for="">Direccion de la Empresa</label>
                        <input type="text" disabled class="form-control" name="direccion" id="direccion"
                           {{--value="{{$config->direccion}}" --}}>
                    </div>>
                    </div>
                    <div class="form-group">
                        <label for="">Telefono</label>
                        <input type="text" disabled class="form-control" name="telefono" id="telefono"
                             {{--value="{{$config->telefono}}"--}}>
                        </div>>
                    </div>
                    <div class="form-group">
                        <label for="">Email</label>
                        <input type="text" disabled class="form-control" name="email" id="email"
                             {{--value="{{$config->email}}"--}}>
                        </div>>
                    </div>
                    <div class="form-group">
                        <label for="">Logo de la Empresa</label>
                        <div class="row justify-content-center">
                            {{--<img src="{{asset('img/'.$config->logo)}}" alt="" width="80" height="50">--}}
                        </div>
                        <br>
                        <div class="row justify-content-center">
                            <div id="preview">

                            </div>
                        </div>
                        <br>
                        <input type="file" disabled class="" id="logoEmpresa" name="logo">
                    </div>
                    <div class="row justify-content-end">
                        <button type="submit" class="btn btn-success btn-sm" disabled
                            id="actualizar">Actualizar</button>
                    </div>
                    @csrf
                </form>
            </div>
            <div class="tab-pane fade" id="comprobantes" role="tabpanel" aria-labelledby="comprobantes-tab">
                <br>
                {{-- @if ($errors->any())
                <div class="alert alert-danger" role="alert">
                    {{$errors->first('nombre')}}
            </div>
            @endif --}}
            <div class=" form-group">
                <a href="" class="btn btn-link btn-sm " data-toggle="modal" data-target="#crearComprobante">Nuevo <i
                        class="fal fa-plus"></i></a>

            </div>
            <div class="row">

                <div class="col-md-12">
                    <table class="table table-bordered table-sm" id="tipoComprobantes">
                        <thead>
                            <tr>
                                <th>#</th>
                                <th>Comprobante</th>
                                <th width="10%">Accion</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($proyectos as $item)
                            <tr>
                                <td>
                                    {{$item->id}}
                                </td>
                                <td>
                                    {{$item->comitente->NombreComitente}}
                                </td>
                            </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</div>
</div>
</div>

<!-- Modal Create Comprobante
<div class="modal fade" id="crearComprobante" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
    aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Nuevo Comprobante</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <form class="form-group " method="POST" action="">
                <div class="modal-body">
                    <div class="form-group">
                        <label>Comprobante</label>
                        <input type="text" name="nombre" required value="" class="form-control">
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary btn-sm" data-dismiss="modal">Cerrar</button>
                    <button type="submit" class="btn btn-primary btn-sm ">Guardar</button>
                </div>
                @csrf
            </form>
        </div>
    </div>
</div> -->

<!-- Modal Create Tipo de Movimiento
<div class="modal fade" id="crearMovimiento" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
    aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Nuevo Comprobante</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <form class="form-group " method="POST" action="">
                <div class="modal-body">
                    <div class="form-group">
                        <label>Tipo de Comprobante</label>
                        <input type="text" name="nombre" required value="" class="form-control">
                    </div>
                    <div class="custom-control custom-radio">
                        <input type="radio" id="customRadio1" name="operacion" value="1" class="custom-control-input"
                            required>
                        <label class="custom-control-label" for="customRadio1">Realiza una suma en el stock</label>
                    </div>
                    <div class="custom-control custom-radio">
                        <input type="radio" id="customRadio2" name="operacion" value="0" class="custom-control-input"
                            required>
                        <label class="custom-control-label" for="customRadio2">Realiza una resta en el stock</label>
                    </div>
                    <div class="custom-control custom-radio">
                        <input type="radio" id="customRadio3" name="operacion" value="" class="custom-control-input"
                            required>
                        <label class="custom-control-label" for="customRadio3">Realiza ambas operaciones a la
                            vez</label>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary btn-sm" data-dismiss="modal">Cerrar</button>
                    <button type="submit" class="btn btn-primary btn-sm ">Guardar</button>
                </div>
                @csrf
            </form>
        </div>
    </div>
</div> -->

<!-- Modal Create Zona
<div class="modal fade" id="crearZona" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
    aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Nuevo Zona</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <form class="form-group " method="POST" action="
                    <div class="form-group">
                        <label>Zona</label>
                        <input type="text" name="nombre" required value="Bº " class="form-control">
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary btn-sm" data-dismiss="modal">Cerrar</button>
                    <button type="submit" class="btn btn-primary btn-sm ">Guardar</button>
                </div>
                @csrf
            </form>
        </div>
    </div>
</div>-->

@endsection

{{--@push('scripts')

<script>
    $('#editar').click(function(){
        $('#nombre').prop('disabled', false);
        $('#direccion').prop('disabled', false);
        $('#telefono').prop('disabled', false);
        $('#email').prop('disabled', false);
        $('#logoEmpresa').prop('disabled', false);
        $('#actualizar').prop('disabled', false);
    });
</script>

{{-- <script>
    $('#editarComprobante').click(function(){
        $('.editable ').attr("contenteditable" , "true");
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
    //cargar imagen local de forma dinamica
        document.getElementById("logoEmpresa").onchange = function(e) {
                // Creamos el objeto de la clase FileReader
                let reader = new FileReader();
                // Leemos el archivo subido y se lo pasamos a nuestro fileReader
                reader.readAsDataURL(e.target.files[0]);
                // Le decimos que cuando este listo ejecute el código interno
                reader.onload = function(){
                    let preview = document.getElementById('preview'),
                    image = document.createElement('img');
                    image.src = reader.result;
                    image.height='50';
                    image.width='80';
                    preview.innerHTML = '';
                    var html = 'Nuevo logo: ' ;
                    preview.append(html);
                    preview.append(image);
                };
        }
</script>

<script>
    $(document).ready(function () {
  $('#myTab a[href="#{{ old('tab') }}"]').tab('show')
});
</script>
 <script>
    @if($errors->any() )
            $(function(){
                $('#crearComprobante').modal('show');
            });
        @endif
</script>

@endpush--}}
