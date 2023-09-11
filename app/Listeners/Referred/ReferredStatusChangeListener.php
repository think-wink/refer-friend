<?php

namespace App\Listeners\Referred;

use App\Events\Referred\ReferredStatusChangeEvent;
use App\Jobs\NurtureCycleEmails\NurtureCycleEmailOneJob;
use App\Jobs\Referred\ReferredStatusChangeJob;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Queue\InteractsWithQueue;

class ReferredStatusChangeListener
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
    public function handle(ReferredStatusChangeEvent $event): void
    {
        dispatch(new ReferredStatusChangeJob($event->referred));
    }
}
