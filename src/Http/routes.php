<?php

use Illuminate\Support\Facades\Route;

$prefix = config('sslcommerz.route_prefix');

// SSLaraCommerz Start
Route::group(['prefix' => $prefix], function () {
    Route::get('/example1', [\AfzalSabbir\SSLaraCommerz\Http\Controllers\SslCommerzPaymentController::class, 'exampleEasyCheckout']);
    Route::get('/example2', [\AfzalSabbir\SSLaraCommerz\Http\Controllers\SslCommerzPaymentController::class, 'exampleHostedCheckout']);

    Route::post('/pay', [\AfzalSabbir\SSLaraCommerz\Http\Controllers\SslCommerzPaymentController::class, 'index']);
    Route::post('/pay-via-ajax', [\AfzalSabbir\SSLaraCommerz\Http\Controllers\SslCommerzPaymentController::class, 'payViaAjax']);

    Route::post('/success', [\AfzalSabbir\SSLaraCommerz\Http\Controllers\SslCommerzPaymentController::class, 'success']);
    Route::post('/fail', [\AfzalSabbir\SSLaraCommerz\Http\Controllers\SslCommerzPaymentController::class, 'fail']);
    Route::post('/cancel', [\AfzalSabbir\SSLaraCommerz\Http\Controllers\SslCommerzPaymentController::class, 'cancel']);

    Route::post('/ipn', [\AfzalSabbir\SSLaraCommerz\Http\Controllers\SslCommerzPaymentController::class, 'ipn']);
});
//SSLaraCommerz End
