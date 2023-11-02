<?php

namespace App\Models;

use App\Models\Traits\HasUUID;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\MorphTo;
use jdavidbakr\MailTracker\Model\SentEmail;

class EmailJob extends Model
{

    use HasUUID;

    protected $fillable = [
        'email_type',
        'email_sent',
        'scheduled_date_time',
        'sent_email_id'
    ];

    protected $casts = [
        'email_sent' => 'boolean',
        'scheduled_date_time'=> 'datetime',
    ];

    public function customer(): MorphTo
    {
        return $this->morphTo();
    }

    public function sentEmail(): BelongsTo
    {
        return $this->belongsTo(SentEmail::class, 'sent_email_id');
    }
}