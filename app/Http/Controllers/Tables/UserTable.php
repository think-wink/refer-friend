<?php

namespace App\Http\Controllers\Tables;

use Illuminate\Support\Facades\Log;
use App\Models\User;
use Illuminate\Http\Request;
use App\Http\Resources\Table\User as UserResource;


class UserTable extends TableController
{
    
    const OPTIONS = [
        'id' => [
            'search' => 'like', 
            'default' => true
        ], 'name' => [
            'search' => 'like', 
            'default' => true
        ], 'email' => [
            'search' => 'like', 
            'default' => true,
        ], 'updated_at' => [
            'search' => 'none', 
            'default' => true
        ], 'role_names' => [
            'search' => 'none',
            'default' => true,
        ], 'created_at' => [
            'search' => 'like', 
            'default' => true
        ],
    ];

    public function data(Request $request) {
        return UserResource::collection(
            $this->queryTable(User::query(), $request)
        );
    }

    public function columns(Request $request) {
        return self::OPTIONS;
    }

}
