<?php

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

Route::group(['prefix' => 'currencies'], function () {
    Route::get('/', 'CurrencyController@index')->name('currencies.index');
});

Route::group(['prefix' => 'payment-methods'], function () {
    Route::get('/', 'PaymentMethodController@index')->name('payment-methods.index');
});

Route::group(['prefix' => 'prices'], function () {
    Route::get('/{id}', 'PriceController@index')->name('prices.index');
    Route::post('/', 'PriceController@store')->name('prices.store');
});
