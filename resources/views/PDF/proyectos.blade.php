@extends('layouts.pdf2')

@section('logo')
<a><img id="imagen" class="float-left rounded " src="logo.jpg"> </a>
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
<br>
<section>
    @section('css')
        @include('layouts.datatables_css')
    @endsection
    <div>
        <table id="lista" >
            <thead>
                <tr id="fa">
                    <th>Codigo</th>
                    <th>Tipo de proyecto</th>
                    <th>Comitente</th>
                    <th>Dirección</th>
                </tr>
            </thead>

            <tbody>

                @foreach ($proyectos as $proyecto)
                <tr>
                    <td style="text-align: center; width: 40%" id="lista">{{ $proyecto->id }}</td>
                    <td style="text-align: center;" id="lista">{{ $proyecto->tipo_proyecto->Nombre }}</td>
                    <td style="text-align: center;" id="lista">{{ $proyecto->comitente->ApellidoComitente }} {{ $proyecto->comitente->NombreComitente }}</td>
                    <td style="width: 150%" id="lista">{{ $proyecto->direccion->Calle}} {{ $proyecto->direccion->Altura}}, {{ $proyecto->direccion->localidad->localidad}}, {{ $proyecto->direccion->provincia->provincia}}</td>
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
