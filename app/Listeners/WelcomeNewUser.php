<?php

namespace App\Listeners;

use Illuminate\Support\Facades\Mail;
use App\Mail\NewUserWelcomeMail;

class WelcomeNewUser
{

    /**
     * Handle the event.
     *
     * @param  object  $event
     * @return void
     */
    public function handle($event)
    {
        Mail::to($event->user->email)->send(new NewUserWelcomeMail());
    }
}
