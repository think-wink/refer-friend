<?php

namespace App\Models\Customer;

use App\Events\Referrer\ReferrerCreatedEvent;
use App\Models\Traits\HasUUID;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Referrer extends Model
{
    use HasFactory;

    use HasUUID;

    public $fillable = ['email'];

    public $casts = [
        'subscribed' => 'boolean'
    ];

    protected static function booted()
    {
        parent::boot();
        // This dispatches an event that send an email whenever a new referrer is created.
        static::created(function ($referrer) {
            ReferrerCreatedEvent::dispatch($referrer);
        });
    }

    public function referred(): HasMany
    {
        return $this->hasMany(Referred::class);
    }
}
