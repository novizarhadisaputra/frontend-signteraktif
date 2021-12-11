<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\OrderController;
use App\Http\Controllers\GoogleController;
use App\Http\Controllers\AboutUsController;
use App\Http\Controllers\PartnerController;
use App\Http\Controllers\ServiceController;
use App\Http\Controllers\HowToUseController;
use App\Http\Controllers\ContactUsController;
use App\Http\Controllers\NotificationController;
use App\Http\Controllers\TransactionController;
use App\Http\Controllers\UserController;

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

Route::get('/', [HomeController::class, 'index'])->name('root');

Route::get('/service', [ServiceController::class, 'index'])->name('service');

Route::resource('partner', PartnerController::class)->except(['index']);
Route::get('find-partner', [PartnerController::class, 'index'])->name('partner.index');
Route::get('/about-us', [AboutUsController::class, 'index'])->name('about-us');
Route::get('/contact-us', [ContactUsController::class, 'index'])->name('contact-us');
Route::get('/how-to-use', [HowToUseController::class, 'index'])->name('how-to-use');
Route::get('/service', [ServiceController::class, 'index'])->name('service');

Route::post('/login', [AuthController::class, 'login'])->name('login');
Route::post('/registration', [AuthController::class, 'registration'])->name('registration');

Route::prefix('verifying')->name('verifying.')->group(function () {
    Route::get('{email}', [AuthController::class, 'verifying'])->name('index');
});

Route::prefix('partner')->name('partner.')->group(function () {
    Route::get('{id}/schedules', [PartnerController::class, 'schedules'])->name('schedules');
});

Route::prefix('reset-password')->name('reset-password.')->group(function () {
    Route::post('/', [AuthController::class, 'resetPassword'])->name('store');
    Route::get('/', [AuthController::class, 'showResetPassword'])->name('index');
    Route::post('/update', [AuthController::class, 'updatePassword'])->name('update');
});

// Google URL
Route::prefix('google')->name('google.')->group(function () {
    Route::get('login', [GoogleController::class, 'loginWithGoogle'])->name('login');
    Route::any('callback', [GoogleController::class, 'callbackFromGoogle'])->name('callback');
});

Route::middleware(['auth'])->group(function () {
    Route::resource('transaction', TransactionController::class);
    Route::prefix('transaction')->name('transaction.')->group(function () {
        Route::get('/user/history', [TransactionController::class, 'history'])->name('history');
        Route::get('/{partnerId}/order', [TransactionController::class, 'showFormOrder'])->name('form.order');
    });
    Route::resource('user', UserController::class);
    Route::prefix('user')->name('user.')->group(function () {
        Route::get('/{id}/profile', [UserController::class, 'show'])->name('profile');
        Route::get('/{id}/notification', [UserController::class, 'listNotification'])->name('notification');
        Route::get('/{id}/event/upcoming-event', [UserController::class, 'upcomingEvent'])->name('event.upcoming');
        Route::get('/{id}/event/list-booking', [UserController::class, 'listOrder'])->name('event.booking');

        Route::post('{id}/update-password', [AuthController::class, 'changePassword'])->name('change.password');
    });
    Route::post('/logout', [AuthController::class, 'logout'])->name('logout');
});

Route::get('notification/midtrans/receive', [NotificationController::class, 'fromMidtrans']);
