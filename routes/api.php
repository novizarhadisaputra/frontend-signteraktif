<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\API\AuthController;
use App\Http\Controllers\API\UserController;
use App\Http\Controllers\API\GoogleController;
use App\Http\Controllers\API\PartnerController;
use App\Http\Controllers\API\FirebaseController;
use App\Http\Controllers\API\ScheduleController;
use App\Http\Controllers\NotificationController;
use App\Http\Controllers\API\TransactionController;

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

Route::middleware(['json'])->group(function () {
    Route::middleware(['auth:api'])->group(function () {
        Route::resource('user', UserController::class);
        Route::resource('schedule', ScheduleController::class);
        Route::post('user/upload/avatar', [UserController::class, 'uploadAvatar']);
        Route::prefix('auth')->group(function () {
            Route::get('me', [AuthController::class, 'me']);
            Route::post('logout', [AuthController::class, 'logout']);
        });
        Route::resource('partner', PartnerController::class);
        Route::get('/partner/list/transaction', [PartnerController::class, 'listTransaction']);
        Route::post('/partner/transaction/{id}/cancel', [TransactionController::class, 'partnerCancel']);
        Route::post('/partner/transaction/{id}/accept', [TransactionController::class, 'partnerAccept']);
        Route::post('/partner/transaction/{id}/finish', [TransactionController::class, 'partnerFinish']);

        Route::prefix('partner')->group(function () {
            Route::get('/list/active', [PartnerController::class, 'listActive']);
            Route::get('/{partner}/schedules', [PartnerController::class, 'schedules']);
        });
        Route::resource('transaction', TransactionController::class);
        Route::prefix('transaction')->group(function () {
            Route::get('/user/history', [TransactionController::class, 'history']);
        });
        Route::resource('firebase', FirebaseController::class);
    });

    Route::prefix('auth')->group(function () {
        Route::post('login', [AuthController::class, 'login']);
        Route::post('login/customer', [AuthController::class, 'loginCustomer']);
        Route::post('login/partner', [AuthController::class, 'loginPartner']);
        Route::post('login/third-party', [AuthController::class, 'loginThirdParty']);
        Route::post('registration', [AuthController::class, 'registration']);
        Route::post('reset-password', [AuthController::class, 'requestResetPassword']);
        Route::post('check-security-code', [AuthController::class, 'checkSecurityCode']);
        Route::put('update-password', [AuthController::class, 'updatePassword']);
    });
    Route::prefix('firebase')->name('firebase.')->group(function () {
        Route::post('store-token', [FirebaseController::class, 'storeToken'])->name('store.token');
    });

    Route::post('notification/midtrans/receive', [NotificationController::class, 'fromMidtrans']);
});
