@extends('layouts.pdf2')

@section('logo')
<a><img id="imagen" class="float-left rounded " src=""> </a>
@endsection

@section('datos')
<p id="encabezado">
    <b>{{$config->nombre}}</b><br>
    {{$config->direccion}}<br>
    Telefono:{{$config->telefono}}<br>
    Email:{{$config->email}}
</p>
@endsection

@section('content')
@section('content')

<div>
    <table id="titulo">
        <thead>
            <tr>
                <th id="fac">Listado de Proyectos</th>
            </tr>
        </thead>
        <tbody>
            {{--
            <tr>
                <th><p id="cliente"> Desde: <br>
                Hasta: </p></th>
            </tr> --}}

        </tbody>
    </table>
</div>
</section>
<br>
<section>
    <div>



    </div>
</section>
<br>
<section>
    <div>
        <table id="lista">
            <thead>
                <tr id="fa">
                    <th>id</th>
                    <th>Comitente</th>
                </tr>
            </thead>

            <tbody>

                @foreach ($proveedores as $prov)
                <tr>
                    <td>{{$prov->id}}</td>
                    <td>{{$prov->comitente->NombreComitente}}</td>
                </tr>
                @endforeach
            </tbody>
            <tbody>
            </tbody>

        </table>
    </div>
</section>
@section('cantidad')
{{$cant}}
@endsection
@stop
