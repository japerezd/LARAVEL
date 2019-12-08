<?php

namespace App\Listeners;

use App\Events\NewStudentHasRegisteredEvent;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Contracts\Queue\ShouldQueue;

class RegisterStudentToNewsletter
{
    
    /**
     * Handle the event.
     *
     * @param  NewStudentHasRegisteredEvent  $event
     * @return void
     */
    public function handle(NewStudentHasRegisteredEvent $event)
    {
        //
        dump("Registered to newsletter");
    }
}
