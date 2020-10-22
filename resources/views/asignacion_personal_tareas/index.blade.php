@extends('layouts.app')

@section('content')
    <section class="content-header">
        <h1 style="color: aliceblue" class="pull-left">Tareas asignadas</h1><br>
    </section>
    <div class="content">
        <div class="clearfix"></div>

        @include('flash::message')

        <div class="clearfix"></div>
        <div class="box box-danger">
            <div class="box-body">


                @section('css')
                @include('layouts.datatables_css')
            @endsection
                <table id="Personal" class="table table-striped table-bordered">
                    <thead>
                        <tr>
                            <th>Nombre</th>
                            <th>Responsabilidad</th>
                            <th>Proyecto</th>
                            <th>Acciones</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($tareas as $asignacion)
                        <tr>
                            <td>{{ $asignacion->tarea->Nombre_tarea }}</td>
                            <td>{{ $asignacion->Responsabilidad }}</td>
                            <td>{{ $asignacion->tarea->proyecto->Nombre_proyecto }}</td>
                            <td>
                                <a href="{{ route('tareas.show', $asignacion->Tarea_id) }}" class='btn btn-default btn-xs'>
                                    <i class="glyphicon glyphicon-eye-open"></i>
                                </a>
                            </td>
                        </tr>
                        @endforeach
                    </tbody>
                </table>
                @section('scripts')
                    @include('layouts.datatables_js')
                @endsection


            </div>
        </div>
        <div class="text-center">

        </div>
    </div>
@endsection

