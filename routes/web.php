<?php

use App\Http\Controllers\KontrakController;
use App\Http\Controllers\PegawaiController;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

// Route::get('/', function () {
//     return view('welcome');
// });

// AJAX PEGAWAI //
Route::post('/pegawai/list', [PegawaiController::class, 'ajaxPegawai'])->name('ajax.pegawai');

Route::post('/kontrak/list', [KontrakController::class, 'ajaxKontrak'])->name('ajax.kontrak');

Route::get('/', [PegawaiController::class, 'index'])->name('pegawai');
Route::get('/pegawai/create', [PegawaiController::class, 'create'])->name('pegawai.create');
Route::post('/pegawai/store', [PegawaiController::class, 'store'])->name('pegawai.store');
Route::get('/pegawai/{id}/edit', [PegawaiController::class, 'edit'])->name('pegawai.edit');
Route::put('/pegawai/{id}', [PegawaiController::class, 'update'])->name('pegawai.update');
Route::get('/pegawai/{id}/delete', [PegawaiController::class, 'delete'])->name('pegawai.delete');

Route::get('/kontrak', [KontrakController::class, 'index'])->name('kontrak');
Route::get('/kontrak/create', [KontrakController::class, 'create'])->name('kontrak.create');
Route::post('/kontrak/store', [KontrakController::class, 'store'])->name('kontrak.store');
Route::get('/kontrak/{id}/edit', [KontrakController::class, 'edit'])->name('kontrak.edit');
Route::put('/kontrak/{id}', [KontrakController::class, 'update'])->name('kontrak.update');
Route::get('/kontrak/{id}/delete', [KontrakController::class, 'delete'])->name('kontrak.delete');
