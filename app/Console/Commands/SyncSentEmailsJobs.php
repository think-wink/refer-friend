<?php

namespace App\Console\Commands;

use App\Models\EmailJob;
use Illuminate\Console\Command;
use jdavidbakr\MailTracker\Model\SentEmail;

class SyncSentEmailsJobs extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'mail:sync-sent-emails-jobs {--force}';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'This Command is used to sync the null sent email id fields for the emails that hev been send already.';

    /**
     * Execute the console command.
     */
    public function handle()
    {
        // Only for emails that have sent_email_id as null
        $emailJobs  = EmailJob::where('email_sent', true)->where('email_type', 'referrer_created')->whereNull('sent_email_id')->get();

        // Log the Number of emails without any value
        $this->info('Total number of emails emails jobs without any sent email id: '.$emailJobs->count());

        // Do a for each to find the email that was sent out
        foreach ($emailJobs as $emailJob){
            $recipient = $emailJob->customer;
            if($recipient && $recipient->email){

                $sentEmails = SentEmail::where('recipient_email', $recipient->email)->where('subject', 'Refer a friend and be rewarded');

                if($sentEmails->count() === 1){
                    $sentEmail = $sentEmails->first();
                    $this->warn('Email Job ID: '.$emailJob->id.' will be linked to Sent Email ID: '.$sentEmail->id);

                    if($this->option('force') === true){
                        $emailJob->update(['sent_email_id' => $sentEmail->id]);
                        $this->info('Email Job ID: '.$emailJob->id.' linked to Sent Email ID: '.$sentEmail->id);
                    }
                } else {
                    $this->warn('More than 1 email exists for Email Job: '.$emailJob->id);
                }
            } else {
                $this->error('Recipient or Recipient Email doesn\'t exist for Email Job ID: '.$emailJob->id);
            }
        }
    }
}