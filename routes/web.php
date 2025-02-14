<?php

use App\Models\Pondok;
use App\Http\Controllers\userWeb;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\View;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\homeController;
use App\Http\Controllers\doaController;
use App\Http\Controllers\PrayerServicesController;

Route::middleware(['auth'])->group(function () {

    Route::get('/', action: function () {
        return view('pages.dashboard');
    });
    Route::get('/home', action: function () {
        return view('pages.dashboard');
    });
    Route::get('/user', action: function () {
        return view('pages.user');
    });
    Route::get('/prayerTimes/{location}/{date}',[PrayerServicesController::class, 'index']);

    Route::get('/home',[homeController::class, 'pondokName']);
    Route::get('/',[homeController::class, 'getapi', 'pondokName']);
    Route::resource('userWeb',userWeb::class);
});

Route::get('/doa', [doaController::class, 'getapi'])->name('doa');
Route::get('/login', [AuthController::class, 'getapi'])->name('login');

// Route::middleware(['auth'])->group(function () {

//     // CASE 1

//     // Route::get('/home', function () {
//     //     $data = DB::table('users')->where('name', Auth::user()->name)->first();
//     //     return view('pages.dashboard',['email'=> $data->name]);
//     // });

//     // CASE 2

//     Route::get('/home',[homeController::class, 'pondokName']);

//     // Route::get('/', function () {
//         //     return view('pages.dashboard');
//         // });

//     Route::get('/',[homeController::class, 'pondokName']);
// });
