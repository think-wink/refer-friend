<?php

namespace App\Listeners\Referrer;

use App\Events\Referrer\ReferrerCreatedEvent;
use App\Jobs\Referrer\SendReferrerCreatedEmail;

class ReferrerCreatedListener
{
    /**
     * Create the event listener.
     */
    public function __construct()
    {
        //
    }

    /**
     * Handle the event.
     */
    public function handle(ReferrerCreatedEvent $event): void
    {
        dispatch(new SendReferrerCreatedEmail($event->referrer));
    }
}
