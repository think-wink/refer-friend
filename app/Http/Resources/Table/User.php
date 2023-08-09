<?php

namespace App\Http\Resources\Table;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;
use App\Http\Resources\ResourceHelper;

/**
 * test
 */
class User extends Table
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
            'name' => $this->name,
            'email' => $this->email,
            'role_names' => $this->roleNames, 
            'updated_at' => ResourceHelper::serializeDate(($this->updated_at)),
            'created_at' => ResourceHelper::serializeDate(($this->created_at)),
            ], $request['columns']
        );
    }
}
