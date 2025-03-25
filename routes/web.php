<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\KaryawanController;
use App\Http\Controllers\SessionController; // Updated to follow naming conventions
use App\Http\Controllers\BarangController;
use App\Http\Controllers\PengirimanController;
use App\Http\Controllers\TransportasiController;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Route::get('/', function () {
    return view('Dashboard');
})->name('Dashboard');

Route::resource('karyawan', KaryawanController::class)->middleware('iniAdmin');
Route::resource('barang', BarangController::class);
Route::resource('pengiriman', PengirimanController::class);
Route::resource('transportasi', TransportasiController::class)->middleware('iniAdmin');

Route::get('/login', [SessionController::class, 'index']);
Route::get('sesi', [SessionController::class, 'index']);
Route::post('sesi/login', [SessionController::class, 'login']);
Route::get('/sesi/logout', [SessionController::class, 'logout']); 
