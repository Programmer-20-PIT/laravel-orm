<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\PondokController;
use App\Http\Controllers\PrayerServicesController;
use App\Http\Controllers\doaController;

Route::post('login', [AuthController::class, 'login'])->name('api.login');

Route::middleware(['auth:sanctum'])->group(function () {

    Route::get('/user', function (Request $request) {
        return $request->user();
    });
    Route::get('doa', [doaController::class, 'getapi'])->name('getapi');
    Route::get('prayerTime/{location}/{date}', [PrayerServicesController::class, 'index']);
    Route::resource('pondok', PondokController::class);
    Route::resource('user', UserController::class);
    Route::post('logout', [AuthController::class, 'logout']);
});
