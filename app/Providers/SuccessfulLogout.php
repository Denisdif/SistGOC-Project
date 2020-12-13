<?php

namespace App\Providers;

use App\Models\Asistencia;
use Illuminate\Auth\Events\Logout;
use Illuminate\Support\Carbon;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Queue\InteractsWithQueue;

class SuccessfulLogout
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
     * @param  Logout  $event
     * @return void
     */
    public function handle(Logout $event)
    {
        $asistencia = Asistencia::all()->where("User_id","=",$event->user->id)->last();
        $asistencia->Salida = Carbon::now();
        $asistencia->save();
    }
}
