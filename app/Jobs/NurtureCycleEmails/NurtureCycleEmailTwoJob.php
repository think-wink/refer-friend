<?php

namespace App\Jobs\NurtureCycleEmails;

use App\Mail\NurtureCycleEmail;
use App\Models\Customer\Referred;
use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Foundation\Bus\Dispatchable;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Queue\SerializesModels;
use Illuminate\Support\Facades\Mail;

class NurtureCycleEmailTwoJob implements ShouldQueue
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
        if($this->referred->reward_status === 'nurture_cycle_email_1_sent') {

            // Send the Nurture Cycle Email
            Mail::to($this->referred)->send(new NurtureCycleEmail($this->referred, 'nurture_cycle_email_2'));

            // update the nurture cycle status in the referred table
            $this->referred->update(['reward_status' => 'nurture_cycle_email_2_sent']);

            // Create a record for this email and the next email to be sent out
            $this->referred->emailJobs()->where('email_type', 'nurture_cycle_email_2')->update(['email_sent' => true]);
            $this->referred->emailJobs()->create(['email_type' => 'nurture_cycle_email_3', 'scheduled_date_time' => now()->addDays(30)]);

        } else {
            $this->referred->emailJobs()->where('email_type', 'nurture_cycle_email_2')->delete();
        }
    }
}
