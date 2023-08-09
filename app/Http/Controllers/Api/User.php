<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class User extends Controller
{
    public function login(Login $request)
    {
        $user = $this->getUser($request->email);
        if (! $user->app_user) {
            return $this->invalidAccount();
        }
        if (! Hash::check($request->password, $user->password)) {
            return $this->invalidPassword();
        }
        
        return response(['token' => $this->getToken($user)], 201);
    }

}
