<?php

namespace App\Events;

use Illuminate\Broadcasting\Channel;
use Illuminate\Queue\SerializesModels;
use Illuminate\Broadcasting\PrivateChannel;
use Illuminate\Broadcasting\PresenceChannel;
use Illuminate\Foundation\Events\Dispatchable;
use Illuminate\Broadcasting\InteractsWithSockets;
use Illuminate\Contracts\Broadcasting\ShouldBroadcast;

class NewStudentHasRegisteredEvent
{
    //ESTE ES EL EVENT
    //para tener acceso al listener
    public $datosEnviar; //<-- se tiene que llamar que donde lo estoy llamando, desde AlumnoController
    use Dispatchable, InteractsWithSockets, SerializesModels;

    /**
     * Create a new event instance.
     *
     * @return void
     */
    //$datosEnviar = Alumno
    public function __construct($datosEnviar)
    {
        //
        $this->datosEnviar = $datosEnviar;
    }

}
