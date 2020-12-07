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
                    <th>Legajo</th>
                    <th>Nombre completo</th>
                    <th>DNI</th>
                    <th>Edad</th>
                    <th>Rol</th>
                </tr>
            </thead>

            <tbody>

                @foreach ($personals as $personal)
                <tr>
                    <td id="lista" style="width: 40%">{{ $personal->id }}</td>
                    <td id="lista">{{ $personal->NombrePersonal }} {{ $personal->ApellidoPersonal }}</td>
                    <td id="lista">{{ $personal->DNI }}</td>
                    <td id="lista">{{ $personal->edad() }} años</td>
                    <td id="lista">{{ $personal->User->rol->NombreRol }}</td>
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
