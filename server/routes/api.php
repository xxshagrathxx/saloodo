<?php

use App\Http\Controllers\Api\AuthController;
use App\Http\Controllers\Api\OrderController;
use App\Http\Controllers\Api\ParcelController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});

Route::prefix('v1')->group(function() {
    // Public Routes
        // Start User
            Route::prefix('/user')->group(function() {
                Route::post('/login', [AuthController::class, 'login'])->name('api.user.login');
            });
        // End User ------
    // End Public Routes ---------

    // Protected Routes
        Route::group(['middleware' => 'auth:sanctum'], function () {
            // Route::get('/info/about/get', [SiteInformationController::class, 'getAbout'])->name('api.about.get');

            // Start User
                Route::prefix('/user')->group(function() {
                    Route::post('/logout', [AuthController::class, 'logout'])->name('api.user.logout');
                    // Route::get('/profile/view', [UserController::class, 'viewProfile'])->name('api.user.profile.view');
                    // Route::post('/profile/update', [UserController::class, 'updateProfile'])->name('api.user.profile.update');
                });
            // End User------

            // Start Parcels
                Route::prefix('/parcel')->group(function() {
                    Route::get('/list', [ParcelController::class, 'list'])->name('api.parcel.list');
                    Route::get('/list-for-bikers', [ParcelController::class, 'listForBikers'])->name('api.parcel.list-for-bikers');
                    Route::post('/store', [ParcelController::class, 'store'])->name('api.parcel.store');
                    Route::post('/update', [ParcelController::class, 'update'])->name('api.parcel.update');
                });
            // End Parcels

            // Start Parcels
                Route::prefix('/order')->group(function() {
                    Route::get('/list-biker-orders', [OrderController::class, 'listBikersOrders'])->name('api.order.list-bikers-orders');
                    Route::get('/update/status/{parcel_id}', [OrderController::class, 'updateStatus'])->name('api.order.update.status');
                });
            // End Parcels
        });
    // End Protected Routes -----
});
