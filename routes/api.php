<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Api\Customer;
use App\Http\Controllers\Api\Auth;


/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "api" middleware group. Make something great!
|
*/

Route::middleware('auth:sanctum')->controller(Customer::class)->group(function() {
    Route::post('referred/update', 'updateReferred');
    Route::post('referred/create', 'createReferred');
    Route::post('referrer/create', 'createReferrer');
});

Route::controller(Auth::class)->group(function(){
    Route::post('login', 'login');
});
