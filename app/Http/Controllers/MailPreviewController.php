<?php

namespace App\Http\Controllers;

use App\Models\EmailJob;
use Inertia\Inertia;

class MailPreviewController extends Controller
{
    public function preview($mail_uuid)
    {

        $email = EmailJob::with('customer')->where('uuid', $mail_uuid)->first();

        if(!$email){
            return Inertia::render('ReferFriend/404Page');
        }

        switch ($email->email_type){
            case 'referrer_created':
                $mailableClass = "App\\Mail\\ReferrerCreatedMail";
                $email_preview = new $mailableClass($email->customer, $email->uuid);
                break;
            case str_contains($email->email_type, 'eligibility_email_'):
                $mailableClass = "App\\Mail\\EligibilityMail";
                $email_preview = new $mailableClass($email->customer, $email->email_type, $email->uuid);
                break;
            case str_contains($email->email_type, 'nurture_cycle_email_'):
                $mailableClass = "App\\Mail\\NurtureCycleMail";
                $email_preview = new $mailableClass($email->customer, $email->email_type, $email->uuid);
                break;
            default:
                break;
        }

        return $email_preview->render();
    }
}
