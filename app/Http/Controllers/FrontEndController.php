<?php

namespace App\Http\Controllers;

use Illuminate\Auth\Access\Response;
use Illuminate\Http\Request;
use App\Models\Customer\Referrer;
use App\Http\Controllers\MailPreviewController;
use Inertia\Inertia;

class FrontEndController extends Controller
{
    public function referFriend(string $uuid)
    {
        if (Referrer::where('uuid', $uuid)->exists()) {
            return Inertia::render('ReferFriend/ReferFriendForm', ['uuid' => $uuid]);
        } else {
            return Inertia::render('ReferFriend/404Page');
        }
    }
    public function eligibility()
    {
        return Inertia::render('ReferFriend/ReferFriendEligibility');
     }

     
     public function unsubscribe(string $type, string $uuid)
     {
         return Inertia::render('ReferFriend/UnsubscribeEmail', [
            'type' => $type, 
            'uuid' => $uuid
        ]);
     }

     public function terms()
     {
        return Inertia::render('ReferFriend/Terms');
     }

     public function faqs()
     {
        return Inertia::render('ReferFriend/FAQs');
     }
     
     
}
