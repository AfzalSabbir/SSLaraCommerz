<?php

use Illuminate\Support\Facades\Route;

// SSLaraCommerz Start
Route::get('/example1', 'App\Http\Controllers\SslCommerzPaymentController@exampleEasyCheckout');
Route::get('/example2', 'App\Http\Controllers\SslCommerzPaymentController@exampleHostedCheckout');

Route::post('/pay', 'App\Http\Controllers\SslCommerzPaymentController@index');
Route::post('/pay-via-ajax', 'App\Http\Controllers\SslCommerzPaymentController@payViaAjax');

Route::post('/success', 'App\Http\Controllers\SslCommerzPaymentController@success');
Route::post('/fail', 'App\Http\Controllers\SslCommerzPaymentController@fail');
Route::post('/cancel', 'App\Http\Controllers\SslCommerzPaymentController@cancel');

Route::post('/ipn', 'App\Http\Controllers\SslCommerzPaymentController@ipn');
//SSLaraCommerz End
