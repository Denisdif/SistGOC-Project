@extends('layouts.app')

@section('content')

    <section class="content-header">
        <h1 style= "color: aliceblue">
            Ambientes cargados al proyecto
        </h1>
    </section>

    {{-- Inicio de DataTable de ambientes del proyecto --}}

    <div class="content-header">
        <div class="box box-danger">
            <div class="box-body">
                <table class="table datatables table-striped table-bordered">
                    <thead>
                        <tr>
                            <th>Nombre</th>
                            <th>Cantidad</th>
                            <th>Acciones</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($ambientesDelProyecto as $ambiente)
                        <tr>
                            <td>{{ $ambiente->ambiente->Nombre_ambiente }}</td>
                            <td>{{ $ambiente->Cantidad }}</td>
                            <td>{!! Form::open(['route' => ['proyectoAmbientes.destroy', $ambiente->id], 'method' => 'delete']) !!}
                                <div class='btn-group'>
                                    {!! Form::button('<i class="glyphicon glyphicon-trash"></i>', [
                                        'type' => 'submit',
                                        'class' => 'btn btn-danger btn-xs',
                                        'onclick' => "return confirm('Esta seguro que desea eliminar este ambiente?')"
                                    ]) !!}
                                </div>
                                {!! Form::close() !!}
                            </td>
                        </tr>
                        @endforeach
                    </tbody>
                </table>
                <div class="text-center">
                    <button class="btn btn-danger" data-toggle="modal" data-target="#ModalCargarAmbiente" type="button">Cargar ambientes</button>
                </div>
            </div>
        </div>
        <a href="{{ route('proyectos.show', $proyecto->id) }}" class="btn btn-default pull-right">Salir</a>
    </div>

    {{--Fin de DataTable de ambientes del proyecto --}}

    {{-- <section class="content-header">
        <h1 style="color: aliceblue">
            Cargar ambientes
        </h1>
    </section>
    <div class="content">
        @include('adminlte-templates::common.errors')
        <div class="box box-danger">
            <div class="box-body">
                <div class="row">
                    @section('css')
                        @include('layouts.datatables_css')
                    @endsection
                    {!! Form::open(['url' => "proyectos/$proyecto->id/proyectoAmbientes"]) !!}

                        @include('proyecto_ambientes.fields')

                    {!! Form::close() !!}
                    @section('scripts')
                        @include('layouts.datatables_js')
                    @endsection
                </div>
            </div>
        </div>
    </div>  --}}

    <div id="ModalCargarAmbiente" class="modal" tabindex="-1" role="dialog">
        <div class="modal-dialog" role="document">
          <div class="modal-content">
            <div class="modal-header">
              <h5 class="modal-title">Modal title
              <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">&times;</span>
              </button></h5>
            </div>

                @section('css')
                    @include('layouts.datatables_css')
                @endsection

                {!! Form::open(['url' => "proyectos/$proyecto->id/proyectoAmbientes"]) !!}

                    @include('proyecto_ambientes.fields')

                @section('scripts')
                    @include('layouts.datatables_js')
                @endsection

            <div class="modal-footer">

              {!! Form::submit('Listo', ['class' => 'btn btn-danger']) !!}
                <a href="javascript:history.back()" data-dismiss="modal" class="btn btn-default">Cancelar</a>
              {!! Form::close() !!}
            </div>
          </div>
        </div>
      </div>

@endsection
