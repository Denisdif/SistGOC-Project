<?php

namespace App\Providers;

use App\Models\Asistencia;
use App\User;
use Illuminate\Auth\Events\Login;
use Illuminate\Auth\Events\Logout;
use Illuminate\Auth\Events\Registered;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Support\Carbon;
use Illuminate\Support\Facades\Auth;

class SuccessfulLogin
{
    /**
     * Create the event listener.
     *
     * @return void
     */
    public function __construct()
    {
        //
    }

    /**
     * Handle the event.
     *
     * @param  Registered  $event
     * @return void
     */
    public function handle(Login $event)
    {
        $asistencia = new Asistencia;
        $asistencia->User_id = $event->user->id;
        $asistencia->Entrada = Carbon::now();
        $asistencia->Salida = Carbon::now()->addMinute(20);
        $asistencia->save();
    }
}
