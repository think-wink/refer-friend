<?php

namespace App\Jobs\EligibilityEmails;

use App\Mail\EligibilityEmails\EligibilityEmailFour;
use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Foundation\Bus\Dispatchable;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Queue\SerializesModels;
use Illuminate\Support\Facades\Mail;

class SendEligibilityEmailFour implements ShouldQueue
{
    use Dispatchable, InteractsWithQueue, Queueable, SerializesModels;

    protected string $customer_type;
    protected int $customer_id;

    /**
     * Create a new job instance.
     */
    public function __construct($customer_type, $customer_id)
    {
        $this->customer_type = $customer_type;
        $this->customer_id = $customer_id;
    }

    /**
     * Execute the job.
     */
    public function handle(): void
    {
        $model = app($this->customer_type)->find($this->customer_id);

        if ($model && $model->subscribed) {

            //If the record exists
            $current_email = $model->emailJob()->where('email_type', 'eligibility_email_4')->where('email_sent', false)->first();

            // Sent the email if it is not sent
            if ($current_email) {

                // If they have filled form delete this job else send email
                if ($model->reward_status === 'eligibility_email_3_sent') {

                    // Sent the eligibility email 4
                    Mail::to($model)->send(new EligibilityEmailFour($model));

                    // Update the record that the email has been sent out
                    $model->update(['reward_status' => 'eligibility_email_4_sent']);
                    $model->emailJob()->where('email_type', 'eligibility_email_4')->update(['email_sent' => true]);

                } else {
                    $current_email->delete();
                }
            }
        }
    }
}