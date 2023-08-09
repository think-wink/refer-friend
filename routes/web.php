<?php

use Illuminate\Http\Request;
use Illuminate\Foundation\Application;
use Illuminate\Support\Facades\Route;
use Inertia\Inertia;
use App\Http\Controllers\Admin\UserController;
use App\Http\Controllers\Admin\AppDetailsController;
use App\Http\Controllers\Source\TransactionController;
use App\Http\Controllers\Admin\DashboardController;
use App\Http\Controllers\Source\RetailerController;
use App\Http\Controllers\Source\PromoController;
use App\Http\Controllers\Source\CommissionController;
use Illuminate\Support\Facades\Log;
use App\Http\Controllers;
use App\Http\Controllers\Tables\PromoTable;
use App\Http\Controllers\Tables\CommissionTable;
use App\Http\Controllers\Tables\RetailerTable;
use App\Http\Controllers\Tables\TransactionTable;
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

