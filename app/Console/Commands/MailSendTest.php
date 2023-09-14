<?php

namespace App\Console\Commands;

use App\Mail\TestMail;
use App\Models\EmailTemplate;
use Illuminate\Console\Command;
use Illuminate\Support\Facades\Mail;

class MailSendTest extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'mail:send-test {email_type} {receivers*}';
    /* sail php artisan mail:send-test referrer_created test1@gmail.com test2@gmail.com */

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'This Command is used to send test emails of type specified in the command to the  list of users provided.';

    /**
     * Execute the console command.
     */
    public function handle()
    {
        // Get the provided email type
        $email = EmailTemplate::where('type', $this->argument('email_type'))->first();

        if($email){
            $receivers = $this->argument('receivers');
            foreach ($receivers as $receiver){
                Mail::to($receiver)->send(new TestMail($email));
                $this->info("Email sent to $receiver");
            }
        } else {
            $this->error("No such Email Found");
        }
    }
}
