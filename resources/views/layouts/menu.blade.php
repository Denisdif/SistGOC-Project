
<li class="{{ Request::is('users*') ? 'active' : '' }}">
    <a href="{{ route('users.index') }}"><i class="fa fa-edit"></i><span>Users</span></a>
</li>

<li class="{{ Request::is('proyectos*') ? 'active' : '' }}">
    <a href="{{ route('proyectos.index') }}"><i class="fa fa-edit"></i><span>Proyectos</span></a>
</li>

{{--<li class="{{ Request::is('tareas*') ? 'active' : '' }}">
    <a href="{{ route('tareas.index') }}"><i class="fa fa-edit"></i><span>Tareas</span></a>
</li>--}}

{{--  <li class="{{ Request::is('proyectoAmbientes*') ? 'active' : '' }}">
    <a href="{{ route('proyectoAmbientes.index') }}"><i class="fa fa-edit"></i><span>Proyecto Ambientes</span></a>
</li>  --}}

<li id="parametros">
    <a href="#"  ><i class="fa fa-edit"></i><span>Parametros</span></a>
    <ul>
        <li class="{{ Request::is('ambientes*') ? 'active' : '' }}">
            <a href="{{ route('ambientes.index') }}"><i class="fa fa-edit"></i><span>Ambientes</span></a>
        </li>

        <li class="{{ Request::is('estadoTareas*') ? 'active' : '' }}">
            <a href="{{ route('estadoTareas.index') }}"><i class="fa fa-edit"></i><span>Estado Tareas</span></a>
        </li>

        <li class="{{ Request::is('tipoTareas*') ? 'active' : '' }}">
            <a href="{{ route('tipoTareas.index') }}"><i class="fa fa-edit"></i><span>Tipo Tareas</span></a>
        </li>
    </ul>
</li>
