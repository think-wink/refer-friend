<?php

namespace App\Jobs\EligibilityEmails;

use App\Mail\EligibilityEmails\EligibilityEmailTwo;
use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Foundation\Bus\Dispatchable;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Queue\SerializesModels;
use Illuminate\Support\Facades\Mail;

class SendEligibilityEmailTwo implements ShouldQueue
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
            $current_email = $model->emailJob()->where('email_type', 'eligibility_email_2')->where('email_sent', false)->first();
            // Sent the email if it is not sent
            if ($current_email) {
                // Sent the eligibility email 1
                Mail::to($model)->send(new EligibilityEmailTwo($model->first_name));

                // Update the record that the email has been sent out
                $model->emailJob()->where('email_type', 'eligibility_email_2')->update(['email_sent' => true]);

                // Create a record for the next email to be sent out
                $model->emailJob()->create(['email_type' => 'eligibility_email_3', 'scheduled_date_time' => now()->addDays(7)]);
            }
        }
    }
}
