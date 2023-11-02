<?php

namespace App\Providers;

use App\Events\Referred\ReferredCreatedEvent;
use App\Events\Referred\ReferredStatusChangeEvent;
use App\Events\Referrer\ReferrerCreatedEvent;
use App\Listeners\EmailSent;
use App\Listeners\Referred\ReferredCreatedListener;
use App\Listeners\Referred\ReferredStatusChangeListener;
use App\Listeners\Referrer\ReferrerCreatedListener;
use Illuminate\Auth\Events\Registered;
use Illuminate\Auth\Listeners\SendEmailVerificationNotification;
use Illuminate\Foundation\Support\Providers\EventServiceProvider as ServiceProvider;
use jdavidbakr\MailTracker\Events\EmailSentEvent;

class EventServiceProvider extends ServiceProvider
{
    /**
     * The event to listener mappings for the application.
     *
     * @var array<class-string, array<int, class-string>>
     */
    protected $listen = [
        Registered::class => [
            SendEmailVerificationNotification::class,
        ],
        ReferrerCreatedEvent::class => [
          ReferrerCreatedListener::class,
        ],
        ReferredCreatedEvent::class => [
          ReferredCreatedListener::class,
        ],
        ReferredStatusChangeEvent::class => [
          ReferredStatusChangeListener::class,
        ],
        EmailSentEvent::class=> [
            EmailSent::class,
        ],
    ];

    /**
     * Register any events for your application.
     */
    public function boot(): void
    {
        //
    }

    /**
     * Determine if events and listeners should be automatically discovered.
     */
    public function shouldDiscoverEvents(): bool
    {
        return false;
    }
}
