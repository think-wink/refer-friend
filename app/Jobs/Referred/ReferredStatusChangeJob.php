<?php

namespace App\Jobs\Referred;

use App\Models\Customer\Referred;
use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Foundation\Bus\Dispatchable;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Queue\SerializesModels;

class ReferredStatusChangeJob implements ShouldQueue
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
        if($this->referred->referrer){
            switch ($this->referred->reward_status) {
                case 'form_completed':
                    // If refereed has completed form, cancel eligibility emails
                    $this->referred->emailJobs()->whereIn('email_type', ['eligibility_email_2', 'eligibility_email_3', 'eligibility_email_4'])->where('email_sent', false)->delete();
                    break;
                case 'not_interested':
                    // If referred is not interested, schedule nurture cycle email 1
                    $this->referred->emailJobs()->updateOrCreate(['email_type' => 'nurture_cycle_email_1', 'email_sent' => false], ['scheduled_date_time' => now()->addDays(2)]);
                    break;
                case 'meeting_booked':
                    // If referred has booked meeting, cancel nurture cycle emails
                    $this->referred->emailJobs()->whereIn('email_type', ['nurture_cycle_email_1', 'nurture_cycle_email_2', 'nurture_cycle_email_3'])->where('email_sent', false)->delete();
                    break;
                default:
                    break;
            };
        }
    }
}
