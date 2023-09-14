<?php

namespace App\Console\Commands;

use App\Jobs\EligibilityEmails\EligibilityEmailFourJob;
use App\Jobs\EligibilityEmails\EligibilityEmailThreeJob;
use App\Jobs\EligibilityEmails\EligibilityEmailTwoJob;
use App\Jobs\NurtureCycleEmails\NurtureCycleEmailOneJob;
use App\Jobs\NurtureCycleEmails\NurtureCycleEmailThreeJob;
use App\Jobs\NurtureCycleEmails\NurtureCycleEmailTwoJob;
use App\Models\EmailJob;
use Illuminate\Console\Command;

class MailCheckStatus extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'mail:check-status';
    /* sail php artisan mail:check-status */

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'This Command is used to send pending emails and also schedule new ones';

    /**
     * Execute the console command.
     */
    public function handle()
    {
        // Get all the Email Jobs
        $emails =  EmailJob::with('customer')->where('email_sent', false)->get();

        // Send Emails based on their current status and their time
        foreach ($emails as $email){

            // Get the referred
            $customer = $email->customer;

            if($email->scheduled_date_time <= now() && $customer && $customer->subscribed) {

                switch ($email->email_type) {
                    case 'eligibility_email_2':
                        dispatch(new EligibilityEmailTwoJob($customer));
                        break;
                    case 'eligibility_email_3':
                        dispatch(new EligibilityEmailThreeJob($customer));
                        break;
                    case 'eligibility_email_4':
                        dispatch(new EligibilityEmailFourJob($customer));
                        break;
                    case 'nurture_cycle_email_1':
                        dispatch(new NurtureCycleEmailOneJob($customer));
                        break;
                    case 'nurture_cycle_email_2':
                        dispatch(new NurtureCycleEmailTwoJob($customer));
                        break;
                    case 'nurture_cycle_email_3':
                        dispatch(new NurtureCycleEmailThreeJob($customer));
                        break;
                    default:
                        break;
                }

            } elseif(!$customer || !$customer->subscribed){
                $email->delete();
            }
        }
    }
}
