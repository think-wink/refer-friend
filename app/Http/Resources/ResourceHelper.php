<?php

namespace App\Http\Resources;

use DateTimeInterface;

class ResourceHelper 
{
    
    static public function serializeDate(DateTimeInterface|null $date): string|null
    {
        if(is_null($date)) {
            return null;
        }
        return $date->format('Y-m-d\TH:i:s.v\Z');
    }
}
