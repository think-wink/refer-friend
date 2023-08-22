<?php

namespace App\Http\Resources\Table;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;
use App\Http\Resources\ResourceHelper;

class Referred extends Table
{
    /**
     * Transform the resource into an array.
     *
     * @return array<string, mixed>
     */
    public function toArray(Request $request): array
    {

        return $this->usedColumns([
            'id' => $this->id,
            'hidden_id' => $this->id,
            'email' => $this->email,
            'phone_number' => $this->phone_number,
            'first_name' => $this->first_name,
            'last_name' => $this->last_name,
            'match_status' => $this->match_status,
            'reward_status' => $this->reward_status,
            'referrer_email' => $this->referrer_email,
            'updated_at' => ResourceHelper::serializeDate(($this->updated_at)),
            'created_at' => ResourceHelper::serializeDate(($this->created_at)),
            ], $request['columns']
        );
    }
}
