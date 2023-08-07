<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Api\SourceController;
use App\Http\Controllers\Api\AuthController;
use App\Http\Controllers\Api\ProfileController;

use App\Http\Controllers\UserController;
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

// Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
//     return $request->user();
// });

// Route::middleware('auth:sanctum')->get('/users', [UserController::class, 'show']);

// Route::middleware('auth:sanctum')->group(function() {
//     Route::get('/retailers', [RetailerController::class, 'list']);
// });



Route::middleware('auth:sanctum')->controller(ProfileController::class)->group(function() {
    Route::get('/profile', 'get');
    Route::post('/profile/update', 'updateProfile');
    Route::post('/profile/updatePassword', 'updatePassword');
});

Route::middleware('auth:sanctum')->controller(SourceController::class)->group(function() {
    Route::get('/retailers', 'retailers');
    Route::get('/promos', 'promos');
    // Route::get('/transactions', 'transactions');
    Route::get('/commissions', 'commissions');

    Route::get('/retailer/{retailer}', 'retailer');
    Route::get('/promo/{promo}', 'promo');
    Route::get('/click/{promo}', 'promo');
    // Route::get('/transaction/{transaction}', 'transaction');
    Route::get('/commission/{commission}', 'commission');

    Route::post('/user/redeem', 'redeem');
    Route::post('/user/promo/{promo}/click', 'click');
});

Route::controller(AuthController::class)->group(function() {
    Route::post('/user/login', 'login');
    Route::post('/user/delete', 'delete');
    Route::post('/user/reset', 'reset');
    Route::post('/user/create', 'create');
    Route::post('/visit/create', 'createVisit');
    Route::post('/visit/{visitor}/update', 'updateVisit');
});

// Route::fallback(fn() => response('Not Found !', 404));