
<li class="{{ Request::is('users*') ? 'active' : '' }}">
    <a href="{{ route('users.index') }}"><i class="fa fa-edit"></i><span>Users</span></a>
</li>

<li class="{{ Request::is('proyectos*') ? 'active' : '' }}">
    <a href="{{ route('proyectos.index') }}"><i class="fa fa-edit"></i><span>Proyectos</span></a>
</li>


<li class="{{ Request::is('ambientes*') ? 'active' : '' }}">
    <a href="{{ route('ambientes.index') }}"><i class="fa fa-edit"></i><span>Ambientes</span></a>
</li>

{{--<li class="{{ Request::is('consideracions*') ? 'active' : '' }}">
    <a href="{{ route('consideracions.index') }}"><i class="fa fa-edit"></i><span>Consideracions</span></a>
</li>

<li class="{{ Request::is('consideracionAmbientes*') ? 'active' : '' }}">
    <a href="{{ route('consideracionAmbientes.index') }}"><i class="fa fa-edit"></i><span>Consideracion Ambientes</span></a>
</li>--}}


