<?php

namespace App\Listeners\Referred;

use App\Events\Referred\ReferredNotInterestedEvent;
use App\Jobs\NurtureCycleEmails\NurtureCycleEmailOneJob;
use App\Jobs\Referred\ReferredNotInterestedJob;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Queue\InteractsWithQueue;

class ReferredNotInterestedListener
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
    public function handle(ReferredNotInterestedEvent $event): void
    {
        dispatch(new ReferredNotInterestedJob($event->referred));
    }
}
