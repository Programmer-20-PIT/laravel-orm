<?php

use App\Models\Pondok;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\homeController;

Route::middleware(['auth'])->group(function () {

    // CASE 1

    // Route::get('/home', function () {
    //     $data = DB::table('users')->where('name', Auth::user()->name)->first();
    //     return view('pages.dashboard',['email'=> $data->name]);
    // });

    // CASE 2

    Route::get('/home',[homeController::class, 'pondokName']);

    // Route::get('/', function () {
        //     return view('pages.dashboard');
        // });

    Route::get('/',[homeController::class, 'pondokName']);
});
