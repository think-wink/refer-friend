<?php

namespace App\Jobs\EligibilityEmails;

use App\Mail\EligibilityEmails\EligibilityEmailOne;
use App\Models\Customer\Referred;
use App\Models\EmailJobs;
use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Foundation\Bus\Dispatchable;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Queue\SerializesModels;
use Illuminate\Support\Facades\Mail;

class SendEligibilityEmailOne implements ShouldQueue
{
    use Dispatchable, InteractsWithQueue, Queueable, SerializesModels;

    protected Referred $referred;

    /**
     * Create a new job instance.
     */
    public function __construct($referred)
    {
        $this->referred = $referred;
    }

    /**
     * Execute the job.
     */
    public function handle(): void
    {
        // Sen the Eligibility Email One
        Mail::to($this->referred)->send(new EligibilityEmailOne($this->referred->first_name));
        // Create a record for this email and the next email to be sent out
        $this->referred->emailJob()->create(['email_type' => 'eligibility_email_1', 'scheduled_date_time' => now(), 'email_sent' => true]);
        $this->referred->emailJob()->create(['email_type' => 'eligibility_email_2', 'scheduled_date_time' => now()->addDays(2)]);
    }
}
