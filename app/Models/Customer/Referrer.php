<?php

namespace App\Models\Customer;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;

use App\Models\Traits\HasUUID;

class Referrer extends Model
{
    use HasFactory;

    use HasUUID;

    public $fillable = ['email'];

    public $casts = [
        'subscribed' => 'boolean'
    ];

    public function referred(): HasMany
    {
        return $this->hasMany(Referred::class);
    }
}
