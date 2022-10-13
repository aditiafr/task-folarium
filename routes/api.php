<?php

use App\Http\Controllers\Api\KontrakController;
use App\Http\Controllers\Api\PegawaiController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

// Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
//     return $request->user();
// });

Route::prefix('pegawai')->group(function(){
    Route::get('list', [PegawaiController::class, 'list'])->name('api.pegawai');
    Route::get('kontrak', [KontrakController::class, 'list'])->name('api.kontrak');
});
