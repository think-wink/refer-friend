<?php

namespace App\Listeners\Referred;

use App\Events\Referred\ReferredCreatedEvent;
use App\Jobs\EligibilityEmails\EligibilityEmailOneJob;

class ReferredCreatedListener
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
    public function handle(ReferredCreatedEvent $event): void
    {
        dispatch(new EligibilityEmailOneJob($event->referred));
    }
}
