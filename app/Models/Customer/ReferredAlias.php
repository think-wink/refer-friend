<?php

namespace App\Models\Customer;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class ReferredAlias extends Model
{
    use HasFactory;

    public $fillable = [
        'email'
    ];

    public function referred(): BelongsTo
    {
        return $this->BelongsTo(Referred::class);
    }
}
