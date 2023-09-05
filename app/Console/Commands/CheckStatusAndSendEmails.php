<?php

namespace App\Console\Commands;

use App\Jobs\EligibilityEmails\SendEligibilityEmailFour;
use App\Jobs\EligibilityEmails\SendEligibilityEmailOne;
use App\Jobs\EligibilityEmails\SendEligibilityEmailThree;
use App\Jobs\EligibilityEmails\SendEligibilityEmailTwo;
use App\Models\EmailJobs;
use Illuminate\Console\Command;

class CheckStatusAndSendEmails extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'check-status:send-emails';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Check Status of referreds and send emails';

    /**
     * Execute the console command.
     */
    public function handle()
    {
        // Unsubscribed people

        // Get all the Email Jobs
        $emails =  EmailJobs::where('email_sent', false)->get();

        // Send Emails based on their current status and their time
        foreach ($emails as $email){
            // If email is past its send time
            if($email->scheduled_date_time < now()) {
                switch ($email->email_type) {
                    case 'eligibility_email_2':
                        dispatch(new SendEligibilityEmailTwo($email->customer_type, $email->customer_id));
                        break;
                    case 'eligibility_email_3':
                        dispatch(new SendEligibilityEmailThree($email->customer_type, $email->customer_id));
                        break;
                    case 'eligibility_email_4':
                        dispatch(new SendEligibilityEmailFour($email->customer_type, $email->customer_id));
                        break;
                    case 'nurture_cycle_email_1':
                        logger('nurture 1');
                        break;
                    case 'nurture_cycle_email_2':
                        logger('nurture 2');
                        break;
                    case 'nurture_cycle_email_3':
                        logger('nurture 3');
                        break;
                    default:
                        break;
                }
            }
        }
    }
}
