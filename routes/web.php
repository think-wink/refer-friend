<?php

use Illuminate\Http\Request;
use Illuminate\Foundation\Application;
use Illuminate\Support\Facades\Route;
use Inertia\Inertia;
use App\Http\Controllers\Admin\UserController;
use App\Http\Controllers\Admin\ReferredController;

use App\Http\Controllers\Tables\ReferredTable;

use App\Http\Controllers\Tables\UserTable;
use App\Models\Source\Retailer;
use App\Http\Controllers\ImageController;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

// Route::middleware([
//     'auth:sanctum',
//     config('jetstream.auth_session'),
//     'verified',
// ])->

Route::prefix('dashboard')->name('dashboard.')->middleware([
    'auth:sanctum',
    config('jetstream.auth_session'),
    'verified',
])->group(function () {
    
    Route::controller(ReferredTable::class)->group(function() {
        Route::get('referred/columns', 'columns');
        Route::get('referred/data', 'data');
        Route::get('referred/{referred}/get', 'get');
        Route::get('referred', 'index');
    });

    Route::controller(UserTable::class)->group(function () {
        Route::get('/users/columns', 'columns');
        Route::get('/users/data', 'data');
    });

    Route::controller(UserController::class)->group(function () {
        Route::get('/users', 'index')->name('users');
        Route::get('/users/api', 'api')->name('api');
        Route::post('/users/tokens/create', 'newToken');
        Route::post('/users/create', 'create');
        Route::put('/users/{user}/store', 'store');
        Route::put('/users/admin/{user}/store', 'storeAdmin');
    });
    
    Route::get('/', function () {
        return Inertia::render('Admin/DashboardPage');
    })->name('accounts');
});

Route::redirect('/', '/dashboard');

Route::get('/refer-friend-form/{uuid}', function($uuid){
   if(\App\Models\Customer\Referrer::where('uuid', $uuid)->exists()){
       return Inertia::render('ReferFriend/ReferFriendForm', ['uuid' => $uuid]);
   } else {
       return Inertia::render('ReferFriend/404Page');
   }
});

Route::get('/refer-friend-eligibility', function(){
   return Inertia::render('ReferFriend/ReferFriendEligibility');
});

Route::get('/referred/{uuid}/unsubscribe-emails', function(){
    return Inertia::render('ReferFriend/UnsubscribeEmail');
});

