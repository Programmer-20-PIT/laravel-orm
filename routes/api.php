<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers;
Route::post('login', [Controllers\AuthController::class, 'login']);

Route::middleware('auth:sanctum')->group(function () {
    Route::resource('negara', Controllers\NegaraController::class);
    Route::get('/user', function (Request $request) {
        return $request->user();
    });

    Route::resource('provinsi', Controllers\ProvinsiController::class);
    Route::resource('kecamatan', Controllers\KecamatanController::class);
    Route::resource('kota', Controllers\KotaController::class);
    Route::resource('kawasan', Controllers\KawasanController::class);
    Route::resource('desa', Controllers\DesaController::class);
    Route::resource('user', Controllers\UserController::class);
    Route::resource('pondok', Controllers\PondokController::class);
    
    Route::resource('alamat', Controllers\AlamatController::class);
    Route::post('logout', [Controllers\AuthController::class, 'logout']);
}); 
    
//     Route::resource('negara', Controllers\NegaraController::class);
//     Route::resource('provinsi', Controllers\ProvinsiController::class);
//     Route::resource('kecamatan', Controllers\KecamatanController::class);
//     Route::resource('kota', Controllers\KotaController::class);
//     Route::resource('kawasan', Controllers\KawasanController::class);
//     Route::resource('desa', Controllers\DesaController::class);
//     Route::resource('user', Controllers\UserController::class);
//     Route::resource('pondok', Controllers\PondokController::class);
    
//     Route::resource('alamat', Controllers\AlamatController::class);Route::post('logout', [Controllers\AuthController::class, 'logout']);
    
//     // return $request->user();
// })->middleware('auth:sanctum');


