@extends('layouts.pdf2')

@section('logo')
<a><img id="imagen" class="float-left rounded " src="{{public_path('img/').$config->logo}}"> </a>
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

<div>
    <table id="titulo">
        <thead>
            <tr>
                <th id="fac">Listado de Reclamos</th>
            </tr>
            <tr>
                <th id="filtros">
                    {{$filtro}}
                </th>
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
                    <th>Nº</th>
                    <th>Tabla</th>
                    <th>Operacion</th>
                    <th>Fecha</th>
                    <th>Hora</th>
                    <th>Usuario</th>
                </tr>
            </thead>

            <tbody>
                @foreach($auditorias as $auditoria)
                <tr>
                    <td>{{$auditoria->auditable_id}}</td>
                    <td>{{strtoupper(str_replace("App\\", "" ,$auditoria->auditable_type))}}</td>
                    <td style="text-transform:uppercase">{{$auditoria->event}}</td>
                    <td>{{$auditoria->created_at->format('d/m/Y')}}</td>
                    <td>{{$auditoria->created_at->format('H:i:s')}}</td>
                    <td>{{$auditoria->user->apellido}} {{$auditoria->user->name}}</td>
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
