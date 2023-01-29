<?php

use App\Http\Controllers\AuthenticationController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\ParcelController;
use Illuminate\Support\Facades\Route;

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

// Route::get('/', function () {
//     return view('welcome');
// });

// Auth::routes();

// Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

Route::redirect('/', '/login')->middleware('withoutSession');
// Route::redirect('/login', '/login')->name('login')->middleware('withoutSession');

Auth::routes(['register' => false, 'reset' => false]);

// Login And Register
    Route::get('/login', [AuthenticationController::class, 'login'])->name('login')->middleware('withoutSession');
    Route::post('/login/check', [AuthenticationController::class, 'loginCheck'])->name('login.check');
    Route::get('/logout', [AuthenticationController::class, 'logout'])->name('logout')->middleware('tokenSession');
// ./Login And Register

// Dashboard
    Route::get('/dashboard', [DashboardController::class, 'index'])->name('dashboard')->middleware('tokenSession');
// ./Dashboard

// Parcel
    Route::prefix('/parcel')->group(function() {
        Route::get('/list', [ParcelController::class, 'list'])->name('parcel.list')->middleware('tokenSession');
        Route::get('/list-bikers-orders', [ParcelController::class, 'listBikersOrders'])->name('parcel.list-bikers-orders')->middleware('tokenSession');
        Route::get('/update-status/{parcel_id}', [ParcelController::class, 'updateStatus'])->name('parcel.update.status')->middleware('tokenSession');
        Route::get('/create/{parcel_id}', [ParcelController::class, 'create'])->name('parcel.create')->middleware('tokenSession');
        Route::post('/update', [ParcelController::class, 'update'])->name('parcel.update')->middleware('tokenSession');
    });
// ./Parcel
