<?php

namespace App\Providers;


use Cardumen\ArgentinaProvinciasLocalidades\Models\Localidad;
use Cardumen\ArgentinaProvinciasLocalidades\Models\Pais;
use Cardumen\ArgentinaProvinciasLocalidades\Models\Provincia;
use App\Models\Tarea;
use App\Models\Personal;
use App\User;
use App\Models\RolPersonal;
use App\Models\Estado_tarea;
use App\Models\Tipo_tarea;
use App\Models\Proyecto;
use App\Models\Ambiente;
use App\Models\AsignacionPersonalTarea;
use App\Models\Comitente;
use App\Models\Sexo;
use App\Models\Tipo_proyecto;
use Illuminate\Support\ServiceProvider;
use Illuminate\Support\Facades\View;

class ViewServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     *
     * @return void
     */
    public function register()
    {
        //
    }

    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot()
    {
        View::composer(['predecesoras.fields'], function ($view) {
            $tareaItems = Tarea::pluck('Nombre_tarea','id')->toArray();
            $view->with('tareaItems', $tareaItems);
        });
        View::composer(['predecesoras.fields'], function ($view) {
            $tareaItems = Tarea::pluck('Nombre_tarea','id')->toArray();
            $view->with('tareaItems', $tareaItems);
        });
        View::composer(['evaluacions.fields'], function ($view) {
            $personalItems = Personal::pluck('NombrePersonal','id')->toArray();
            $view->with('personalItems', $personalItems);
        });
        View::composer(['direccions.fields'], function ($view) {
            $localidadeItems = Localidad::pluck('localidad','id')->toArray();
            $view->with('localidadeItems', $localidadeItems);
        });
        View::composer(['direccions.fields'], function ($view) {
            $provinciaItems = Provincia::pluck('provincia','id')->toArray();
            $view->with('provinciaItems', $provinciaItems);
        });
        View::composer(['direccions.fields'], function ($view) {
            $paiseItems = Pais::pluck('pais','id')->toArray();
            $view->with('paiseItems', $paiseItems);
        });
        View::composer(['asignacion_personal_tareas.fields'], function ($view) {
            $tareaItems = Tarea::pluck('Nombre_tarea','id')->toArray();
            $view->with('tareaItems', $tareaItems);
        });
        View::composer(['asignacion_personal_tareas.fields'], function ($view) {
            $personalItems = Personal::pluck('NombrePersonal','id')->toArray();
            $view->with('personalItems', $personalItems);
        });

        View::composer(['asignacion_personal_tareas.fields'], function ($view) {
            $personal = Personal::all();
            $view->with('personal', $personal);
        });

        View::composer(['personals.fields'], function ($view) {
            $userItems = User::pluck('name','id')->toArray();
            $view->with('userItems', $userItems);
        });
        View::composer(['personals.fields'], function ($view) {
            $rol_personalItems = RolPersonal::pluck('NombreRol','id')->toArray();
            $view->with('rol_personalItems', $rol_personalItems);
        });
        View::composer(['tareas.fields'], function ($view) {
            $estado_tareaItems = Estado_tarea::pluck('Nombre_estado_tarea','id')->toArray();
            $view->with('estado_tareaItems', $estado_tareaItems);
        });
        View::composer(['tareas.fields'], function ($view) {
            $tipo_tareaItems = Tipo_tarea::pluck('Nombre_tipo_tarea','id')->toArray();
            $view->with('tipo_tareaItems', $tipo_tareaItems);
        });
        View::composer(['tareas.fields'], function ($view) {
            $proyectoItems = Proyecto::pluck('Nombre_proyecto','id')->toArray();
            $view->with('proyectoItems', $proyectoItems);
        });
        View::composer(['proyecto_ambientes.fields'], function ($view) {
            $proyectoItems = Proyecto::pluck('Nombre_proyecto','id')->toArray();
            $view->with('proyectoItems', $proyectoItems);
        });
        View::composer(['proyecto_ambientes.fields'], function ($view) {
            $ambienteItems = Ambiente::pluck('Nombre_ambiente','id')->toArray();
            $view->with('ambienteItems', $ambienteItems);
        });
        View::composer(['proyectos.create'], function ($view) {
            $ambienteItems = Ambiente::pluck('Nombre_ambiente','id')->toArray();
            $view->with('ambienteItems', $ambienteItems);
        });
        View::composer(['asignacion_personal_tareas.fields'], function ($view) {
            $asignacionItems = AsignacionPersonalTarea::all();
            $view->with('asignacionItems', $asignacionItems);
        });

        View::composer(['users.fields'], function ($view) {
            $RolPersonalItems = RolPersonal::pluck('NombreRol','id')->toArray();
            $view->with('RolPersonalItems', $RolPersonalItems);
        });

        View::composer(['personals.fields'], function ($view) {
            $RolPersonalItems = RolPersonal::pluck('NombreRol','id')->toArray();
            $view->with('RolPersonalItems', $RolPersonalItems);
        });

        View::composer(['proyectos.fields'], function ($view) {
            $sexoItems = Sexo::pluck('Nombre_sexo','id')->toArray();
            $view->with('sexoItems', $sexoItems);
        });

        View::composer(['comitentes.fields'], function ($view) {
            $sexoItems = Sexo::pluck('Nombre_sexo','id')->toArray();
            $view->with('sexoItems', $sexoItems);
        });

        View::composer(['personals.fields'], function ($view) {
            $sexoItems = Sexo::pluck('Nombre_sexo','id')->toArray();
            $view->with('sexoItems', $sexoItems);
        });

        View::composer(['personals.index'], function ($view) {
            $sexoItems = Sexo::pluck('Nombre_sexo','id')->toArray();
            $view->with('sexoItems', $sexoItems);
        });

        View::composer(['proyectos.fields'], function ($view) {
            $tipo_proyectoItems = Tipo_proyecto::pluck('Nombre','id')->toArray();
            $view->with('tipo_proyectoItems', $tipo_proyectoItems);
        });

        View::composer(['proyectos.fields'], function ($view) {
            $comitentes = Comitente::all();
            $view->with('comitentes', $comitentes);
        });
        //
    }
}
