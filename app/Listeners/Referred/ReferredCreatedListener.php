<?php

namespace App\Listeners\Referred;

use App\Events\Referred\ReferredCreatedEvent;
use App\Jobs\EligibilityEmails\SendEligibilityEmailOne;

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
        dispatch(new SendEligibilityEmailOne($event->referred));
    }
}
