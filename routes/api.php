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
    Route::post('referred/upsert', 'updateReferredStatus');
    Route::post('referrer/create', 'createReferrer');
    Route::post('referred/{referred}/update', 'updateReferred');
    Route::post('referred/{original}/merge',  'mergeReferred');
});

Route::controller(Customer::class)->group(function() {
    Route::post('referrer/{uuid}/referred/create', 'createReferred');
    Route::post('referrer/{uuid}/unsubscribe', 'unsubscribeReferrer');
    Route::post('referred/{uuid}/unsubscribe', 'unsubscribeReferred');
});

Route::controller(Auth::class)->group(function(){
    Route::post('login', 'login');
});

Route::controller(Customer::class)->group(function(){
    Route::post('referrer/{uuid}/referred/create', 'createReferred');
});