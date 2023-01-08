<?php

use Illuminate\Support\Facades\Route;

$prefix = config('sslcommerz.route_prefix');

// SSLaraCommerz Start
Route::group(['prefix' => $prefix], function () {
    Route::get('/example1', [\App\Http\Controllers\SslCommerzPaymentController::class, 'exampleEasyCheckout']);
    Route::get('/example2', [\App\Http\Controllers\SslCommerzPaymentController::class, 'exampleHostedCheckout']);

    Route::post('/pay', [\App\Http\Controllers\SslCommerzPaymentController::class, 'index']);
    Route::post('/pay-via-ajax', [\App\Http\Controllers\SslCommerzPaymentController::class, 'payViaAjax']);

    Route::post('/success', [\App\Http\Controllers\SslCommerzPaymentController::class, 'success']);
    Route::post('/fail', [\App\Http\Controllers\SslCommerzPaymentController::class, 'fail']);
    Route::post('/cancel', [\App\Http\Controllers\SslCommerzPaymentController::class, 'cancel']);

    Route::post('/ipn', [\App\Http\Controllers\SslCommerzPaymentController::class, 'ipn']);
});
//SSLaraCommerz End
