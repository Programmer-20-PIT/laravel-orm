<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\PondokController;


Route::post('login', [AuthController::class, 'login'])->name('api.login');

Route::middleware(['auth:sanctum'])->group(function () {

    Route::get('/user', function (Request $request) {
        return $request->user();
    });
    Route::apiResource('pondok', PondokController::class);
    Route::apiResource('user', UserController::class);
    Route::post('logout', [AuthController::class, 'logout'])->name('api.logout');
});
