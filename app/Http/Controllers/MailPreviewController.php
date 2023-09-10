<?php

namespace App\Http\Controllers;

use App\Models\EmailJobs;

class MailPreviewController extends Controller
{
    public function preview($mail_uuid)
    {

        $email = EmailJobs::with('customer')->where('uuid', $mail_uuid)->first();

        switch ($email->email_type){
            case 'referrer_created':
                $mailableClass = "App\\Mail\\ReferrerCreatedMail";
                $email_preview = new $mailableClass($email->customer, $email->uuid, true);
                break;
            case str_contains($email->email_type, 'eligibility_email_'):
                $mailableClass = "App\\Mail\\EligibilityMail";
                $email_preview = new $mailableClass($email->customer, $email->email_type, $email->uuid, true);
                break;
            case str_contains($email->email_type, 'nurture_cycle_email_'):
                $mailableClass = "App\\Mail\\NurtureCycleMail";
                $email_preview = new $mailableClass($email->customer, $email->email_type, $email->uuid, true);
                break;
            default:
                break;
        }

        return $email_preview->render();
    }
}
