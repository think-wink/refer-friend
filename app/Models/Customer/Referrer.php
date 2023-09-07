<?php

namespace App\Models\Customer;

use App\Events\Referrer\ReferrerCreatedEvent;
use App\Models\EmailJobs;
use App\Models\Traits\HasUUID;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\Relations\MorphMany;

class Referrer extends Model
{
    use HasFactory;

    use HasUUID;

    public $fillable = [
        'email',
        'accepted_contact',
        'accepted_terms'
    ];

    public $casts = [
        'subscribed' => 'boolean'
    ];

    protected static function booted()
    {
        parent::boot();
        // This prevents events from being dispatcher when testing or reseeding,etc.
        if (!app()->runningInConsole() || app()->runningUnitTests()) {
            // This dispatches an event that send an email whenever a new referrer is created.
            static::created(function ($referrer) {
                ReferrerCreatedEvent::dispatch($referrer);
            });
        }
    }

    public function referred(): HasMany
    {
        return $this->hasMany(Referred::class);
    }

    public function emailJobs(): MorphMany
    {
        return $this->morphMany(EmailJobs::class, 'customer');
    }
}
