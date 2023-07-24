<?php

use Illuminate\Support\Facades\Route;

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
    return view('admin.barcode.index');
});
Route::prefix('barcode')->group(function () {
    Route::get('index', ['as' => 'admin.barcode.index', 'uses' => 'App\Http\Controllers\BarCodeController@index']);
    Route::post('store', ['as' => 'admin.barcode.store', 'uses' => 'App\Http\Controllers\BarCodeController@store']);
    Route::post('verify', ['as' => 'admin.barcode.verify', 'uses' => 'App\Http\Controllers\BarCodeController@verify']);
    Route::post('update/{id}', ['as' => 'admin.barcode.update', 'uses' => 'App\Http\Controllers\BarCodeController@update']);
    Route::get('destroy/{id}', ['as' => 'admin.barcode.destroy', 'uses' => 'App\Http\Controllers\BarCodeController@destroy']);
    Route::get('purge/{id}', ['as' => 'admin.barcode.purge', 'uses' => 'App\Http\Controllers\BarCodeController@purge']);
});
