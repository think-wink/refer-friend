<?php

namespace App\Jobs\EligibilityEmails;

use App\Mail\EligibilityMail;
use App\Models\Customer\Referred;
use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Foundation\Bus\Dispatchable;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Queue\SerializesModels;
use Illuminate\Support\Carbon;
use Illuminate\Support\Facades\Mail;

class EligibilityEmailTwoJob implements ShouldQueue
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
        if ($this->referred->reward_status === 'eligibility_email_1_sent') {

            $mail = $this->referred->emailJobs()->where('email_type', 'eligibility_email_2')->first();

            // Sent the eligibility email 2
            Mail::to($this->referred)->send(new EligibilityMail($this->referred, 'eligibility_email_2', $mail->uuid));

            // Update the record that the email has been sent out
            $mail->update(['email_sent' => true]);
            $this->referred->update(['reward_status' => 'eligibility_email_2_sent']);

            // Scheduled Time
            $time = Carbon::parse($mail->scheduled_date_time)->format('H:i:s');
            $scheduled_date_time = Carbon::parse($mail->scheduled_date_time)->addDays(5)->format('Y-m-d') . ' ' . $time;

            // Create a record for the next email to be sent out
            $this->referred->emailJobs()->create(['email_type' => 'eligibility_email_3', 'scheduled_date_time' => $scheduled_date_time]);

        } else {
            $this->referred->emailJobs()->where('email_type', 'eligibility_email_2')->delete();
        }
    }
}
