<?php

namespace App\Listeners;

use App\Events\NewStudentHasRegisteredEvent;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Contracts\Queue\ShouldQueue;

class NotifyAdminViaSlack
{
   
    public function handle(NewStudentHasRegisteredEvent $event)
    {
        //
        dump('Mensaje slack aqui');
    }
}
