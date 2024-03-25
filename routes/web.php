<?php

use App\Http\Controllers\AuthController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\LocalizationController;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Route::get('locale/{language}', [LocalizationController::class, 'setLanguage']);

Route::group(['domain' => 'admin.' . env('DOMAIN')], function () {
    Route::controller(AuthController::class)->group(function () {
        Route::middleware('guest')->group(function () {
            Route::get('login', 'login')->name('login');
            Route::post('login', 'loginProcess');
            Route::get('forgot-password', 'forgotPassword')->name('password.request');
            Route::post('forgot-password', 'forgotPasswordProcess')->name('password.email');
            Route::get('reset-password/{token}', 'resetPassword')->name('password.reset');
            Route::post('reset-password', 'resetPasswordProcess')->name('password.update');
        });
        Route::get('logout', 'logout');
    });

    Route::middleware('auth:web')->group(function () {
        Route::controller(DashboardController::class)->group(function () {
            Route::get('/', 'index');
        });
    });
});

Route::get('/', function () {
    return view('welcome');
});
