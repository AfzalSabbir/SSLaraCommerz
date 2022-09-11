<?php

use Illuminate\Support\Facades\Route;
use AfzalSabbir\SSLaraCommerz\Http\Controllers\SslCommerzPaymentController;

// SSLCOMMERZ Start
Route::controller(SslCommerzPaymentController::class)->group(function () {
    Route::get('/example1', 'exampleEasyCheckout');
    Route::get('/example2', 'exampleHostedCheckout');

    Route::post('/pay', 'index');
    Route::post('/pay-via-ajax', 'payViaAjax');

    Route::post('/success', 'success');
    Route::post('/fail', 'fail');
    Route::post('/cancel', 'cancel');

    Route::post('/ipn', 'ipn');
});
//SSLCOMMERZ END
