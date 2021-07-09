<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\BarangController;
use App\Http\Controllers\OperasionalController;

use App\Http\Controllers\PenjualanController;

use App\Http\Controllers\RegistrasiController;


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


Route::resource('barang', BarangController::class);
Route::get('/laporan-barang', [BarangController::class, 'report']);

Route::resource('penjualan', PenjualanController::class);

Route::resource('operasional', OperasionalController::class);
Route::get('/laporan-operasional', [OperasionalController::class, 'report']);





// Auth::routes();

Route::get('/', [App\Http\Controllers\HomeController::class, 'index'])->name('home');


// hak akses untuk admin
Route::group(['middleware' => 'directure'], function (){
    Route::get('/registrasi', [RegistrasiController::class, 'index'])->name('registrasi');
});


Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
