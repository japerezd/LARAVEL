<?php

namespace App\Providers;

use App\Events\NewStudentHasRegisteredEvent;
use App\Listeners\WelcomeNewStudentListener;
use App\Listeners\RegisterStudentToNewsletter;
use App\Listeners\NotifyAdminViaSlack;
use Illuminate\Support\Facades\Event;
use Illuminate\Auth\Events\Registered;
use Illuminate\Auth\Listeners\SendEmailVerificationNotification;
use Illuminate\Foundation\Support\Providers\EventServiceProvider as ServiceProvider;

class EventServiceProvider extends ServiceProvider
{
    /**
     * The event listener mappings for the application.
     *
     * @var array
     */
    protected $listen = [
        //agregando mi evento
        NewStudentHasRegisteredEvent::class => [
            //aqui se agrega el listener
            WelcomeNewStudentListener::class,
            RegisterStudentToNewsletter::class,
            NotifyAdminViaSlack::class,
        ],
    ];

    /**
     * Register any events for your application.
     *
     * @return void
     */
    public function boot()
    {
        parent::boot();

        //
    }
}
