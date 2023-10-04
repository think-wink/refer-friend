<?php

namespace App\Models\Customer;

use App\Events\Referred\ReferredCreatedEvent;
use App\Events\Referred\ReferredStatusChangeEvent;
use App\Models\EmailJob;
use App\Models\Traits\HasUUID;
use Illuminate\Support\Collection;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\Relations\MorphMany;

class Referred extends Model
{    
    use HasFactory;

    use HasUUID;

    public $casts = [
        'subscribed' => 'boolean'
    ];

    protected $attributes = [
        'reward_status' => 'eligibility_email_1_sent'
    ];
    
    // set by us
    const INTERNAL_STATUS = [
        'eligibility_email_1_sent',
        'eligibility_email_2_sent',
        'eligibility_email_3_sent',
        'eligibility_email_4_sent',
        'nurture_cycle_email_1_sent',
        'nurture_cycle_email_2_sent',
        'nurture_cycle_email_3_sent',
        'reward_credited',
    ];

    const EXTERNAL_STATUS = [
        'form_completed',# Customer has completed the calculator form
        'not_interested',  # Customer is eligible but is not interested
        'meeting_booked',   # Customer has their 15 min qualifying call booked
        'ineligible',  # Customer is not eligible for a loan
        'pension_boost_eligible', # Customer has been referred to Pension Boost
        'eligible', # Customer is eligible for a loan, but it is not approved yet
        'loan_settled', # Customer and the referrer will be issued with a reward
        'pb_approved',  # Customer, and the referre
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


    public static function getReadableStatusObject(): Collection
    {
        return collect(self::EXTERNAL_STATUS)
            ->concat(self::INTERNAL_STATUS)
            ->mapWithKeys(fn (string $value) => [$value => str_replace('_', ' ', $value)]);
            
    }

    protected static function booted()
    {
        parent::boot();
         // This prevents events from being dispatcher when testing or reseeding,etc.
         if (!app()->runningInConsole() && !app()->runningUnitTests()) {
             // Email new referred
             static::created(function ($referred) {
                 ReferredCreatedEvent::dispatch($referred);
             });
             // If the referred is not interested
             static::updated(function ($referred) {
                 ReferredStatusChangeEvent::dispatch($referred);
             });
         }
    }

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

    public function emailJobs(): MorphMany
    {
        return $this->morphMany(EmailJob::class, 'customer');
    }
}
