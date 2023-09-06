<?php

namespace App\Jobs\Referrer;

use App\Mail\Referrer\ReferrerCreated;
use App\Models\Customer\Referrer;
use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Foundation\Bus\Dispatchable;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Queue\SerializesModels;
use Illuminate\Support\Facades\Mail;

class SendReferrerCreatedEmail implements ShouldQueue
{
    use Dispatchable, InteractsWithQueue, Queueable, SerializesModels;

    protected Referrer $referrer;

    /**
     * Create a new job instance.
     */
    public function __construct($referrer)
    {
        $this->referrer = $referrer;
    }

    /**
     * Execute the job.
     */
    public function handle(): void
    {
        Mail::to($this->referrer)->send(new ReferrerCreated());
        $this->referrer->emailJob()->create(['email_type' => 'referrer_created', 'scheduled_date_time' => now(), 'email_sent' => true]);
    }
}
