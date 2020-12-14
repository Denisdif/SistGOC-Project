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
        <b> Filtros: </b> {{ $filtro }} <br><br>
    </div>
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
                    <td style="text-align: center; width: 40%" id="lista">{{$auditoria->auditable_id}}</td>
                    <td style="text-align: center;" id="lista">{{(str_replace("App\\Models\\", "" ,$auditoria->auditable_type))}}</td>
                    <td style="text-align: center;" id="lista">{{$auditoria->event}}</td>
                    <td style="text-align: center;" id="lista">{{$auditoria->created_at->format('d/m/Y')}}</td>
                    <td style="text-align: center;" id="lista">{{$auditoria->created_at->format('H:i:s')}}</td>
                    <td style="text-align: center;" id="lista">{{$auditoria->user->apellido}} {{$auditoria->user->name}}</td>
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
