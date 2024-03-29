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
    // Item
    Route::group(['prefix' => 'barang', 'as' => 'item.'], function () {
        Route::get('/', 'App\Http\Controllers\Main\ItemController@index')->name('index');
        Route::post('/', 'App\Http\Controllers\Main\ItemController@store')->name('store');
        Route::match(['put', 'patch'], '/{item}', 'App\Http\Controllers\Main\ItemController@update')->name('update');
        Route::delete('/{item}', 'App\Http\Controllers\Main\ItemController@destroy')->name('destroy');
    });
    // Supplier
    Route::group(['prefix' => 'suplier', 'as' => 'supplier.'], function () {
        Route::get('/', 'App\Http\Controllers\Main\SupplierController@index')->name('index');
        Route::post('/', 'App\Http\Controllers\Main\SupplierController@store')->name('store');
        Route::match(['put', 'patch'], '/{item}', 'App\Http\Controllers\Main\SupplierController@update')->name('update');
        Route::delete('/{supplier}', 'App\Http\Controllers\Main\SupplierController@destroy')->name('destroy');
    });
    // Incoming Item
    Route::group(['prefix' => 'barang-masuk', 'as' => 'incoming-item.'], function () {
        Route::get('/', 'App\Http\Controllers\Item\IncomingItemController@index')->name('index');
        Route::post('/', 'App\Http\Controllers\Item\IncomingItemController@store')->name('store');
        Route::match(['put', 'patch'], '/{item}', 'App\Http\Controllers\Item\IncomingItemController@update')->name('update');
        Route::delete('/{incomingItem}', 'App\Http\Controllers\Item\IncomingItemController@destroy')->name('destroy');
    });
    // Outgoing Item
    Route::group(['prefix' => 'barang-keluar', 'as' => 'outgoing-item.'], function () {
        Route::get('/', 'App\Http\Controllers\Item\OutgoingItemController@index')->name('index');
        Route::post('/', 'App\Http\Controllers\Item\OutgoingItemController@store')->name('store');
        Route::match(['put', 'patch'], '/{item}', 'App\Http\Controllers\Item\OutgoingItemController@update')->name('update');
        Route::delete('/{outgoingItem}', 'App\Http\Controllers\Item\OutgoingItemController@destroy')->name('destroy');
        // Update Process
        Route::match(['put', 'patch'], '/process-item/{id}', 'App\Http\Controllers\Item\OutgoingItemController@processItem')->name('process-item');
        Route::match(['put', 'patch'], '/acccept-item/{id}', 'App\Http\Controllers\Item\OutgoingItemController@acceptItem')->name('accept-item');
        Route::match(['put', 'patch'], '/reject-item/{id}', 'App\Http\Controllers\Item\OutgoingItemController@deleteItem')->name('reject-item');
    });
    // Transaction
    Route::group(['prefix' => 'transaksi', 'as' => 'transaction.'], function () {
        Route::get('/', 'App\Http\Controllers\Transaction\TransactionController@index')->name('index');
        Route::post('/add-item', 'App\Http\Controllers\Transaction\TransactionController@addItem')->name('add-item');
        Route::post('/update-item', 'App\Http\Controllers\Transaction\TransactionController@updateItem')->name('update-item');
        Route::post('/delete-item', 'App\Http\Controllers\Transaction\TransactionController@deleteItem')->name('delete-item');
    });
    // Report
    Route::group(['prefix' => 'laporan', 'as' => 'report.'], function () {
        // Report Incoming Item
        Route::get('/barang-masuk', 'App\Http\Controllers\Report\ReportController@incoming_item')->name('incoming-item');
        Route::get('print-pdf-masuk/{fromDate}/{toDate}/{itemId}', 'App\Http\Controllers\Report\ReportController@pdf_print_incoming');
        // Report Incoming Item
        Route::get('/barang-keluar', 'App\Http\Controllers\Report\ReportController@outgoing_item')->name('outgoing-item');
        Route::get('print-pdf-keluar/{fromDate}/{toDate}/{itemId}', 'App\Http\Controllers\Report\ReportController@pdf_print_outgoing');
    });
    // User
    Route::group(['prefix' => 'user', 'as' => 'user.'], function () {
        Route::get('/', 'App\Http\Controllers\System\UserController@index')->name('index');
        Route::post('/', 'App\Http\Controllers\System\UserController@store')->name('store');
        Route::match(['put', 'patch'], '/{item}', 'App\Http\Controllers\System\UserController@update')->name('update');
        Route::delete('/{user}', 'App\Http\Controllers\System\UserController@destroy')->name('destroy');
    });
});
