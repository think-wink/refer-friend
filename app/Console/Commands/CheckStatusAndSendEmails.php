<?php

namespace App\Console\Commands;

use App\Jobs\EligibilityEmails\SendEligibilityEmailFour;
use App\Jobs\EligibilityEmails\SendEligibilityEmailThree;
use App\Jobs\EligibilityEmails\SendEligibilityEmailTwo;
use Illuminate\Console\Command;
use Illuminate\Support\Facades\DB;

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

        // Get all the emails and status in the emails table that needs to be send out
        $emails =  DB::table('email_status')
            //                        ->whereNot('current_status', '')
                        ->get();

        // Send Emails based on their current status and their time
        foreach ($emails as $email){

            // Only start sending emails after two days
            if($email->current_status === 'eligibility_email') {

                // Get the difference in days
                $diff_days = now()->diffInDays($email->last_email_at);


                if ($diff_days >= 2 && $diff_days <7 ) {

                    logger('send email 2');
                    SendEligibilityEmailTwo::dispatch($email->referred_uuid);

                } elseif ($diff_days >= 7 && $diff_days < 14) {

                    logger('send email 3');
                    SendEligibilityEmailThree::dispatch($email->referred_uuid);

                } elseif ($diff_days >= 14) {

                    // this will keep spamming the user with email 4
                    logger('send email 4');
                    SendEligibilityEmailFour::dispatch($email->referred_uuid);

                } else {
                    // either it's not 2 days yet
                    logger($email->id);
                }

            }
        }
    }
}
