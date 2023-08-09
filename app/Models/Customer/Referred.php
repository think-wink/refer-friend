<?php

namespace App\Models\Customer;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Referred extends Model
{
    // set by us
    const INTERNAL_STATUS = [
        'eligibly_email_1_sent', 
        'eligibly_email_2_sent',
        'eligibly_email_3_sent',
        'nurture_cycle_email_1_sent',
        'nurture_cycle_email_2_sent',
        'nurture_cycle_email_3_sent',
        'eligibly_form_completed_unmatched',
        'reward_credited'
    ];

    
    // set by other party
    const EXTERNAL_STATUS = [
        'eligibly_form_completed',
        'not_interested', 
        'meeting_booked', 
        'ineligible', 
        'pension_boot_eligible',
        'loan_eligible',
        'loan_approved', 
        'pension_boot_approved', 
    ];
    use HasFactory;
}
