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

class EligibilityEmailThreeJob implements ShouldQueue
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
        if ($this->referred->reward_status === 'eligibility_email_2_sent') {

            // Sent the eligibility email 2
            Mail::to($this->referred)->send(new EligibilityEmail($this->referred, 'eligibility_email_3'));

            // Update the record that the email has been sent out
            $this->referred->update(['reward_status' => 'eligibility_email_3_sent']);
            $this->referred->emailJobs()->where('email_type', 'eligibility_email_3')->update(['email_sent' => true]);

            // Create a record for the next email to be sent out
            $this->referred->emailJobs()->create(['email_type' => 'eligibility_email_4', 'scheduled_date_time' => now()->addDays(14)]);

        } else {
            $this->referred->emailJobs()->where('email_type', 'eligibility_email_3')->delete();
        }
    }
}
