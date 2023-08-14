<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Support\Facades\Hash;
use App\Http\Requests\Api\Auth\Login;
 
class Auth extends Controller {

    protected function getUser(string $email): User|null {
        return User::where('email', $email)->first();
    }

    protected function invalidAccount()
    {
        return response(['errors' => ['email' => 'account is not associated with the app']], 401);
    }

    protected function invalidPassword()
    {
        return response(['errors' => ['password' => 'Given email does not match the password !']], 401);
    }

    protected function getToken(User $user) 
    {
        return $user->createToken('auth_token', ['*'])->plainTextToken;
    }

    /**
     * Login to the API 
     * 
     * requires an email & password. returns an API token to use with the other endpoints
     * contact a wink admin to get your account setup
     * 
     * @response 201 {"token": "2060|dEKg7dU3vespqTYTuGa1wpkUPGkKISJsWav2XH9p"}
     * @unauthenticated
    */
    public function login(Login $request)
    {
        $user = $this->getUser($request->email);
        
        if (! $user) {
            return $this->invalidAccount();
        }

        if (! Hash::check($request->password, $user->password)) {
            return $this->invalidPassword();
        }
        
        return response(['token' => $this->getToken($user)], 201);
    }
}
