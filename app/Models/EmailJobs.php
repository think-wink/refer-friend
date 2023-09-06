<?php

namespace App\Models;

use App\Models\Customer\Referred;
use Illuminate\Database\Eloquent\Model;

class EmailJobs extends Model
{

    protected $fillable = [
        'email_type',
        'email_sent',
        'scheduled_date_time'
    ];

    protected $casts = [
        'email_sent' => 'boolean',
    ];

    public function customer()
    {
        return $this->morphTo();
    }

}