<li >
    <a href="{{ route('personals.show', Auth :: user()->Personal_id) }}"><i class="icon-user"></i><span> Mi perfil</span></a>
</li>

@if ((Auth :: user()->Rol_id == 1) or (Auth :: user()->Rol_id == 2))

    <li >
        <a href="{{ route('proyectos.index') }}"><i class="icon-folder-open-alt"></i><span> Proyectos </span></a>
    </li>

    <li >
        <a href="{{ route('personals.index') }}"><i class="icon-group"></i><span> Personal</span></a>
    </li>

    @if ((Auth :: user()->Rol_id == 1))

        <li >
            <a href="{{ route('auditoria.index') }}"><i class="icon-eye-open"></i><span> Auditoria</span></a>
        </li>

    @endif

    <li class="nav-item">
        <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapseAuditoria" aria-expanded="true" aria-controls="collapseAuditoria">
            <i class="icon-cogs"></i><span> Parámetros</span>
        </a>
        <div id="collapseAuditoria" class="collapse" aria-labelledby="headingTwo" data-parent="#accordionSidebar">
          <div>
            <ul>

                <li class="{{ Request::is('ambientes*') ? 'active' : '' }}">
                    <a href="{{ route('ambientes.index') }}"><i class="fa fa-edit"></i><span>Ambientes</span></a>
                </li>

                <li class="{{ Request::is('tipoTareas*') ? 'active' : '' }}">
                    <a href="{{ route('tipoTareas.index') }}"><i class="fa fa-edit"></i><span>Tipos de Tareas</span></a>
                </li>

                <li class="{{ Request::is('tipoProyectos*') ? 'active' : '' }}">
                    <a href="{{ route('tipoProyectos.index') }}"><i class="fa fa-edit"></i><span>Tipos de Proyectos</span></a>
                </li>

                @if (Auth :: user()->Rol_id == 1)

                    <li class="{{ Request::is('sexos*') ? 'active' : '' }}">
                        <a href="{{ route('sexos.index') }}"><i class="fa fa-edit"></i><span>Sexos</span></a>
                    </li>

                    <li class="{{ Request::is('comitentes*') ? 'active' : '' }}">
                        <a href="{{ route('comitentes.index') }}"><i class="fa fa-edit"></i><span>Comitentes</span></a>
                    </li>
                    
                @endif
            </ul>
          </div>
        </div>
    </li>

@endif

@if ((Auth :: user()->Rol_id == 4))

        <li >
            <a href="{{ route('auditoria.index') }}"><i class="icon-eye-open"></i><span> Auditoria</span></a>
        </li>

    @endif

@if (Auth :: user()->Rol_id == 3)

    <li >
        <a href="{{ route('asignacionPersonalTareas.indexPersonal') }}"><i class="fa fa-edit" ></i><span>Tareas</span></a>
    </li>

@endif










{{--<li class="{{ Request::is('asignacionPersonalTareas*') ? 'active' : '' }}">
    <a href="{{ route('asignacionPersonalTareas.index') }}"><i class="fa fa-edit"></i><span>Asignacion Personal Tareas</span></a>
</li>--}}

{{--  <li class="{{ Request::is('proyectoAmbientes*') ? 'active' : '' }}">
    <a href="{{ route('proyectoAmbientes.index') }}"><i class="fa fa-edit"></i><span>Proyecto Ambientes</span></a>
</li>
{{--<li class="{{ Request::is('direccions*') ? 'active' : '' }}">
    <a href="{{ route('direccions.index') }}"><i class="fa fa-edit"></i><span>Direccions</span></a>
</li>--}}

{{--
<li class="{{ Request::is('entregas*') ? 'active' : '' }}">
    <a href="{{ route('entregas.index') }}"><i class="fa fa-edit"></i><span>Entregas</span></a>
</li>

<li class="{{ Request::is('comentarios*') ? 'active' : '' }}">
    <a href="{{ route('comentarios.index') }}"><i class="fa fa-edit"></i><span>Comentarios</span></a>
</li>

<li class="{{ Request::is('evaluacions*') ? 'active' : '' }}">
    <a href="{{ route('evaluacions.index') }}"><i class="fa fa-edit"></i><span>Evaluacions</span></a>
</li>--}}

{{-- <li class="{{ Request::is('users*') ? 'active' : '' }}">
    <a href="{{ route('users.index') }}"><i class="fa fa-edit"></i><span>Usuarios</span></a>
</li>  --}}

{{--<li class="{{ Request::is('predecesoras*') ? 'active' : '' }}">
    <a href="{{ route('predecesoras.index') }}"><i class="fa fa-edit"></i><span>Predecesoras</span></a>
</li>

<li class="{{ Request::is('estadoTareas*') ? 'active' : '' }}">
    <a href="{{ route('estadoTareas.index') }}"><i class="fa fa-edit"></i><span>Estados de Tareas</span></a>
</li> --}}

