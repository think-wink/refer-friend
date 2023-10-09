<?php

namespace App\Jobs\EligibilityEmails;

use App\Mail\EligibilityMail;
use App\Models\Customer\Referred;
use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Foundation\Bus\Dispatchable;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Queue\Middleware\RateLimited;
use Illuminate\Queue\SerializesModels;
use Illuminate\Support\Facades\Mail;

class EligibilityEmailFourJob implements ShouldQueue
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
        // If they have filled form delete this job else send email
        if ($this->referred->reward_status === 'eligibility_email_3_sent' && $this->referred->referrer) {

            $mail = $this->referred->emailJobs()->where('email_type', 'eligibility_email_4')->first();

            // Sent the eligibility email 4
            Mail::to($this->referred)->send(new EligibilityMail($this->referred, 'eligibility_email_4', $mail->uuid));

            // Update the record that the email has been sent out
            $mail->update(['email_sent' => true]);
            $this->referred->update(['reward_status' => 'eligibility_email_4_sent']);

        } else {
            $this->referred->emailJobs()->where('email_type', 'eligibility_email_4')->delete();
        }
    }

    public function middleware(): array
    {
        return [new RateLimited('emails')];
    }
}
