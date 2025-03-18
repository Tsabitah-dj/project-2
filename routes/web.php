<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\KaryawanController;
use App\Http\Controllers\sessioncontroller;
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

Route::resource('karyawan', KaryawanController::class);
Route::resource('barang', BarangController::class);
Route::resource('pengiriman', PengirimanController::class);
Route::resource('transportasi', TransportasiController::class);

route::get('/login',[sessioncontroller::class,'index']);
route::get('sesi',[sessioncontroller::class,'index']);
route::post('sesi/login',[sessioncontroller::class,'login']);
route::get('/sesi/logout',[sessioncontroller::class,'logout']);

