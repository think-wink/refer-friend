<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Http\Requests\Api\Customer\CreateReferrer;

class Customer extends Controller
{
    public function createReferrer(CreateReferrer $request){
        return response($request, 201);
    }
}
