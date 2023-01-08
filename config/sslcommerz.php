<?php

// SSLCommerz configuration
return [
    'projectPath' => env('PROJECT_PATH'),
    // For Sandbox, use "https://sandbox.sslcommerz.com"
    // For Live, use "https://securepay.sslcommerz.com"
    'apiDomain' => env("SSL_COMMERZ_API_DOMAIN_URL", "https://sandbox.sslcommerz.com"),
    'apiCredentials' => [
        'store_id' => env("SSL_COMMERZ_STORE_ID"),
        'store_password' => env("SSL_COMMERZ_STORE_PASSWORD"),
    ],
    'apiUrl' => [
        'make_payment' => "/gwprocess/v4/api.php",
        'transaction_status' => "/validator/api/merchantTransIDvalidationAPI.php",
        'order_validate' => "/validator/api/validationserverAPI.php",
        'refund_payment' => "/validator/api/merchantTransIDvalidationAPI.php",
        'refund_status' => "/validator/api/merchantTransIDvalidationAPI.php",
    ],
    'connect_from_localhost' => env("SSL_COMMERZ_IS_LOCALHOST", true), // For Sandbox, use "true", For Live, use "false"
    'route_prefix' => env('SSL_COMMERZ_PREFIX', 'sslcommerz'),
    'success_url' => '/success',
    'failed_url' => '/fail',
    'cancel_url' => '/cancel',
    'ipn_url' => '/ipn',
];
