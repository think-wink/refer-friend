<?php

namespace App\Jobs\EligibilityEmails;

use App\Mail\EligibilityEmail;
use App\Models\Customer\Referred;
use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Foundation\Bus\Dispatchable;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Queue\SerializesModels;
use Illuminate\Support\Facades\Mail;

class EligibilityEmailOneJob implements ShouldQueue
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
        // Send the Eligibility Email One
        Mail::to($this->referred)->send(new EligibilityEmail($this->referred, 'eligibility_email_1'));

        // Create a record for this email and the next email to be sent out
        $this->referred->emailJobs()->create(['email_type' => 'eligibility_email_1', 'scheduled_date_time' => now(), 'email_sent' => true]);
        $this->referred->emailJobs()->create(['email_type' => 'eligibility_email_2', 'scheduled_date_time' => now()->addDays(2)]);
    }
}
