<?php

namespace App\Mail;

use App\Models\Proyecto;
use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;

class Aviso extends Mailable
{
    use Queueable, SerializesModels;

    public $proyecto;

    public function __construct(Proyecto $proyecto)
    {
        $this->proyecto = $proyecto::find($proyecto->id);
    }

    public function build()
    {
        return $this->view('mails.proyectos');
    }
}
