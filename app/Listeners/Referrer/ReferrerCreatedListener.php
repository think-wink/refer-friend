<?php

namespace App\Listeners\Referrer;

use App\Events\Referrer\ReferrerCreatedEvent;
use App\Jobs\Referrer\ReferrerCreatedJob;

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
        dispatch(new ReferrerCreatedJob($event->referrer));
    }
}
