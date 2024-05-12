<?php

use App\Http\Controllers\AdminController;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\EventController;
use App\Http\Controllers\IntangibleCulturalController;
use App\Http\Controllers\LocalizationController;
use App\Http\Controllers\LibraryController;
use App\Http\Controllers\TangibleCulturalController;
use Illuminate\Support\Facades\Route;

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

    Route::middleware('auth:admin')->group(function () {
        Route::controller(DashboardController::class)->group(function () {
            Route::get('/', 'index');
            Route::get('dashboard', 'index');
        });

        Route::prefix('administrators')->controller(AdminController::class)->group(function () {
            Route::get('/', 'index');
            Route::get('create', 'create');
            Route::post('check', 'check');
            Route::post('store', 'store');
            Route::get('detail/{id}', 'detail');
            Route::get('edit/{id}', 'edit');
            Route::delete('destroy', 'destroy');
        });

        Route::prefix('tangible-cultural-heritages')->controller(TangibleCulturalController::class)->group(function () {
            Route::get('/', 'index');
            Route::get('create', 'create');
            Route::post('check', 'check');
            Route::post('store', 'store');
            Route::get('detail/{id}', 'detail');
            Route::get('edit/{id}', 'edit');
            Route::delete('destroy', 'destroy');
        });

        Route::prefix('intangible-cultural-heritages')->controller(IntangibleCulturalController::class)->group(function () {
            Route::get('/', 'index');
            Route::get('create', 'create');
            Route::post('check', 'check');
            Route::post('store', 'store');
            Route::get('detail/{id}', 'detail');
            Route::get('edit/{id}', 'edit');
            Route::delete('destroy', 'destroy');
        });

        Route::prefix('events')->controller(EventController::class)->group(function () {
            Route::get('/', 'index');
            Route::get('create', 'create');
            Route::post('check', 'check');
            Route::post('store', 'store');
            Route::get('detail/{id}', 'detail');
            Route::get('edit/{id}', 'edit');
            Route::delete('destroy', 'destroy');
        });

        Route::prefix('libraries')->controller(LibraryController::class)->group(function () {
            Route::get('/', 'index');
            Route::get('create', 'create');
            Route::post('check', 'check');
            Route::post('store', 'store');
            Route::get('detail/{id}', 'detail');
            Route::get('edit/{id}', 'edit');
            Route::delete('destroy', 'destroy');
        });
    });
});

Route::get('/', function () {
    return view('welcome');
});
