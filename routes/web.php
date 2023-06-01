<?php

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

require __DIR__ . '/auth.php';

// Route::get('/', function () {
//     return view('pages.auth.login');
// });

Route::get('/', function () {
    if (Auth::user()) {
        return redirect()->route('dashboard');
    }
    return view('pages.auth.login');
});

Route::get('/dashboard', function () {
    return view('pages.dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::group(['middleware' => 'auth'], function () {
    // Dashboard
    Route::get('/dashboard', 'App\Http\Controllers\DashboardController@index')->name('dashboard');
    // Category
    Route::group(['prefix' => 'kategori', 'as' => 'category.'], function () {
        Route::get('/', 'App\Http\Controllers\Main\CategoryController@index')->name('index');
        Route::post('/', 'App\Http\Controllers\Main\CategoryController@store')->name('store');
        Route::match(['put', 'patch'], '/{category}', 'App\Http\Controllers\Main\CategoryController@update')->name('update');
        Route::delete('/{category}', 'App\Http\Controllers\Main\CategoryController@destroy')->name('destroy');
    });
    // Product
    Route::group(['prefix' => 'barang', 'as' => 'item.'], function () {
        Route::get('/', 'App\Http\Controllers\Main\ItemController@index')->name('index');
        Route::post('/', 'App\Http\Controllers\Main\ItemController@store')->name('store');
        Route::match(['put', 'patch'], '/{item}', 'App\Http\Controllers\Main\ItemController@update')->name('update');
        Route::delete('/{item}', 'App\Http\Controllers\Main\ItemController@destroy')->name('destroy');
    });
    // Transaction
    Route::group(['prefix' => 'transaksi', 'as' => 'transaction.'], function () {
        Route::get('/', 'App\Http\Controllers\Transaction\TransactionController@index')->name('index');
        Route::get('/tambah-transaksi', 'App\Http\Controllers\Transaction\TransactionController@create')->name('create');
    });
    // Report
    Route::group(['prefix' => 'laporan', 'as' => 'report.'], function () {
        Route::get('/', 'App\Http\Controllers\Report\ReportController@index')->name('index');
    });
    // User
    Route::group(['prefix' => 'user', 'as' => 'user.'], function () {
        Route::get('/', 'App\Http\Controllers\System\UserController@index')->name('index');
    });
    // Store
    Route::group(['prefix' => 'setting', 'as' => 'store.'], function () {
        Route::get('/', 'App\Http\Controllers\System\StoreController@index')->name('index');
    });
});
