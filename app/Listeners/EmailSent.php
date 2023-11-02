<?php

namespace App\Listeners;

use App\Models\EmailJob;
use Illuminate\Contracts\Queue\ShouldQueue;
use jdavidbakr\MailTracker\Events\EmailSentEvent;
use Illuminate\Foundation\Bus\Dispatchable;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Bus\Queueable;
use Illuminate\Queue\SerializesModels;

class EmailSent implements ShouldQueue
{

    use Dispatchable, InteractsWithQueue, Queueable, SerializesModels;

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
    public function handle(EmailSentEvent $event): void
    {
        $emailJobUuid = $event->sent_email->getHeader('X-Model-ID');

        if($emailJobUuid){
            // Find Email job by the uuid and then attach the email sent by the id
            EmailJob::where('uuid', $emailJobUuid)->update(['sent_email_id' => $event->sent_email['id']]);
        }
    }
}
