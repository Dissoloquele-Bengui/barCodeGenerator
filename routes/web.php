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
    return view('welcome');
});
Route::prefix('barcode')->group(function () {
    Route::get('index', ['as' => 'admin.barcode.index', 'uses' => 'App\Http\Controllers\BarCodeController@index']);
    Route::get('create', ['as' => 'admin.barcode.create', 'uses' => 'App\Http\Controllers\BarCodeController@create']);
    Route::post('store', ['as' => 'admin.barcode.store', 'uses' => 'App\Http\Controllers\BarCodeController@store']);
    Route::get('edit/{id}', ['as' => 'admin.barcode.edit', 'uses' => 'App\Http\Controllers\BarCodeController@edit']);
    Route::post('update/{id}', ['as' => 'admin.barcode.update', 'uses' => 'App\Http\Controllers\BarCodeController@update']);
    Route::get('destroy/{id}', ['as' => 'admin.barcode.destroy', 'uses' => 'App\Http\Controllers\BarCodeController@destroy']);
    Route::get('purge/{id}', ['as' => 'admin.barcode.purge', 'uses' => 'App\Http\Controllers\BarCodeController@purge']);
});
