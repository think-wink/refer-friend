<?php

namespace App\Jobs\NurtureCycleEmails;

use App\Mail\NurtureCycleMail;
use App\Models\Customer\Referred;
use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Foundation\Bus\Dispatchable;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Queue\SerializesModels;
use Illuminate\Support\Facades\Mail;

class NurtureCycleEmailOneJob implements ShouldQueue
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
        if($this->referred->reward_status === 'not_interested' && $this->referred->referrer) {

            $mail = $this->referred->emailJobs()->where('email_type', 'nurture_cycle_email_1')->first();

            // Send the Nurture Cycle Email One
            Mail::to($this->referred)->send(new NurtureCycleMail($this->referred, 'nurture_cycle_email_1', $mail->uuid));

            // update the nurture cycle status in the referred table
            $mail->update(['email_sent' => true]);
            $this->referred->update(['reward_status' => 'nurture_cycle_email_1_sent']);

            // Create a record for this email and the next email to be sent out
            $this->referred->emailJobs()->create(['email_type' => 'nurture_cycle_email_2', 'scheduled_date_time' => $mail->scheduled_date_time->addDays(12)]);

        } else {
            $this->referred->emailJobs()->where('email_type', 'nurture_cycle_email_1')->delete();
        }
    }
}
