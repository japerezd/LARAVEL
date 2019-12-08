<?php

namespace App\Listeners;

use App\Mail\WelcomeNewUserMail;
use Illuminate\Support\Facades\Mail;
use Illuminate\Contracts\Queue\ShouldQueue;
//use App\Events\NewStudentHasRegisteredEvent;

class WelcomeNewStudentListener implements ShouldQueue
{
   
//ESTE ES EL LISTENER
    /**
     * Handle the event.
     *
     * @param  object  $event
     * @return void
     */
    public function handle($event)
    {
        //
        
        sleep(10); //10 seconds

        Mail::to($event->datosEnviar->email)->send(new WelcomeNewUserMail());
    }
}
