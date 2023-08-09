<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use Inertia\Inertia;

use App\Http\Controllers\Controller;

use Illuminate\Support\Facades\Log;

use App\Models\User;

use App\Http\Requests\User\Store as StoreRequest;
use App\Http\Requests\User\AdminStore;

use Illuminate\Support\Facades\Hash;

class UserController extends Controller
{
    /**
     * Display a listing of the resource.
     */    
    public function index()
    {

        return Inertia::render('Admin/UsersTable', [
            'table' => [
                'table_url' => route('dashboard.users'),
                'box_filter_column' => 'email'
            ],
            'user_url' => '/dashboard/users/admin/'
        ]);

    }

    public function api(Request $request)
    {
        return Inertia::render('Admin/API', [
            'tokens' => $request->user()->tokens
        ]);
    }

    public function newToken(Request $request) 
    {
        $token = $request->user()->createToken('auth_token');
        return ['token' => $token->plainTextToken];
    }

    public function create(Request $request)
    {
        User::create([
            'email' => $request['email'],
            'name' => 'New User',
            'password' => Hash::make('password')
        ]);
    }

    public function store(User $user, Request $request)
    {
        $request_data = $request->all();
        $user->fill($request_data)->save();
    }
    
    public function storeAdmin(User $user, Request $request)
    {
        if($request->new_email) {
            $user->email = $request->new_email;
        }

        if($request->new_email) {
            $user->email = $request->new_email;
        }

        if($request->new_password) {
            $user->password = Hash::make($request->new_password);
        }
        $user->save();
        return;
    }
}
