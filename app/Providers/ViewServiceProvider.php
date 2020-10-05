<?php

namespace App\Providers;
use App\Models\Consideracion;
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
        View::composer(['consideracion_ambientes.fields'], function ($view) {
            $consideracionItems = Consideracion::pluck('Nombre_Consideracion','id')->toArray();
            $view->with('consideracionItems', $consideracionItems);
        });
        View::composer(['consideracion_ambientes.fields'], function ($view) {
            $ambienteItems = Ambiente::pluck('Nombre_ambiente','id')->toArray();
            $view->with('ambienteItems', $ambienteItems);
        });
        //
    }
}