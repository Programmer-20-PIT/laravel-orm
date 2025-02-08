<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthController;

Route::get('/', function () {
    return view('pages.dashboard');
});

Route::get('/login', function () {
    return view('pages.login');
});
Route::middleware(['auth:sanctum'])->group(function () {

    Route::get('/contacts', function () {
        return view('contact');
    });
});
