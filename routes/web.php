<?php

use App\Http\Controllers\ErrorController;
use App\Http\Controllers;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
});

Route::get('/contacts', function () {
    return view('contact');
});

Route::post('login', [Controllers\AuthController::class, 'login']);

Route::get('/error/900',[ErrorController::class,'index'])->name('error');
