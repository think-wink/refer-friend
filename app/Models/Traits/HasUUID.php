<?php
namespace App\Models\Traits;
use Illuminate\Support\Str;

trait HasUUID {
    protected static function boot()
    {
        parent::boot();
        static::creating(function ($model) {
            if($model->uuid === null) {
                $model->uuid = Str::uuid()->toString();
            }
        });
    }
}