@extends('layouts.app')

@section('content')
    <section class="content-header">
        <h1 style="color: aliceblue" class="pull-left">Personal</h1>
        <h1 class="pull-right">
           <a class="btn btn-danger pull-right" style="margin-top: -10px;margin-bottom: 5px" href="{{ route('personals.create') }}">Add New</a>
        </h1>
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
                            <th>Nombre completo</th>
                            <th>DNI</th>
                            <th>Acciones</th>
                        </tr>
                    </thead>
                    <tbody id="Var1">
                        @foreach ($ListaPersonal as $personal)
                        <tr>
                            <td>{{ $personal->NombrePersonal }} {{ $personal->ApellidoPersonal }}</td>
                            <td>{{ $personal->DNI }}</td>
                            <td>{!! Form::open(['route' => ['personals.destroy', $personal->id], 'method' => 'delete']) !!}
                                <div class='btn-group'>
                                    <a href="{{ route('personals.show', $personal->id) }}" class='btn btn-default btn-xs'>
                                        <i class="glyphicon glyphicon-eye-open"></i>
                                    </a>
                                    <a href="{{ route('personals.edit', $personal->id) }}" class='btn btn-default btn-xs'>
                                        <i class="glyphicon glyphicon-edit"></i>
                                    </a>
                                    {!! Form::button('<i class="glyphicon glyphicon-trash"></i>', [
                                        'type' => 'submit',
                                        'class' => 'btn btn-danger btn-xs',
                                        'onclick' => "return confirm('Esta seguro que desea eliminar esta tarea?')"
                                    ]) !!}
                                </div>
                                {!! Form::close() !!}
                            </td>
                        </tr>
                        @endforeach
                    </tbody>
                </table>
                @section('scripts')
                    @include('layouts.datatables_js')
                @endsection

                 <button id="btnNuevo" type="button">Modal</button>
            </div>
        </div>
        <div class="text-center">
        </div>
    </div>




    <div id="PruebaModal" class="modal" tabindex="-1" role="dialog">
        <div class="modal-dialog" role="document">
          <div class="modal-content">
            <div class="modal-header" style="background-color: rgb(255, 55, 55)">
              {{--  <h5 class="modal-title">Modal title</h5>  --}}
              <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">&times;</span>
              </button>
            </div>
            <div class="modal-body">
              <p>Hola Exe soy un modal</p>
            </div>
            <div class="modal-footer">
              <button type="button" class="btn btn-secondary" data-dismiss="modal">Cerrar</button>
            </div>
          </div>
        </div>
    </div>


@endsection



