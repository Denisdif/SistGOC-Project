<?php

namespace App\Mail;

use App\Models\AsignacionPersonalTarea;
use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;

class AsignacionTarea extends Mailable
{
    use Queueable, SerializesModels;

    public $asignacion;

    public function __construct(AsignacionPersonalTarea $asignacion)
    {
        $this->asignacion = $asignacion::find($asignacion->id);
    }

    /**
     * Build the message.
     *
     * @return $this
     */
    public function build()
    {
        return $this->view('mails.asignacionTarea');
    }
}
