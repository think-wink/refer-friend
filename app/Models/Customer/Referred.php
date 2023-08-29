<?php

namespace App\Models\Customer;

use App\Models\Traits\HasUUID;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Referred extends Model
{    
    use HasFactory;

    use HasUUID;

    public $casts = [
        'subscribed' => 'boolean'
    ];

    
    // set by us
    const INTERNAL_STATUS = [
        'eligibly_email_1_sent', 
        'eligibly_email_2_sent',
        'eligibly_email_3_sent',
        'eligibly_email_4_sent',
        'nurture_cycle_email_1_sent',
        'nurture_cycle_email_2_sent',
        'nurture_cycle_email_3_sent',
        'reward_credited',
    ];

    // set by other party
    const EXTERNAL_STATUS = [
        'form_completed',
        'not_interested', 
        'meeting_booked', 
        'ineligible', 
        'pension_boost_eligible',
        'loan_eligible',
        'loan_approved', 
        'pension_boost_approved', 
    ];

    const MATCH_STATUS = [
        'auto', // the status was auto set.
        'manual', // the status was manually matched & has aliases
        'failed', // the match failed 
        'not_updated', // this item has not be updated via a 3rd party yet
    ];

    public $fillable = [
        'email',
        'phone_number',
        'first_name',
        'last_name',
        'match_status',
        'reward_status'
    ];

    public function referredAlias(): HasMany
    {
        return $this->hasMany(ReferredAlias::class);
    }

    public function referrer(): BelongsTo 
    {
        return $this->BelongsTo(Referrer::class);
    }

    public function setAutoStatus(): static {
        if($this->match_status === 'not_updated') {
            $this->match_status = 'auto';
            $this->save();
        }
        return $this->refresh();
    }
}
