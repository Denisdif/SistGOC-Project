<?php

namespace App\Providers;




use App\Models\Estado_tarea;
use App\Models\Tipo_tarea;
use App\Models\Proyecto;
use App\Models\Ambiente;

use Illuminate\Support\ServiceProvider;
use View;

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

        View::composer(['consideracion_ambientes.fields'], function ($view) {
            $ambienteItems = Ambiente::pluck('Nombre_ambiente','id')->toArray();
            $view->with('ambienteItems', $ambienteItems);
        });
        //
    }
}
