<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthController;


Route::middleware(['auth'])->group(function () {

    Route::get('/', action: function () {
        return view('pages.dashboard');
    });
    Route::get('/home', action: function () {
        return view('pages.dashboard');
    });
});
