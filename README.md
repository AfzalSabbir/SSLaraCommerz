# SSLaraCommerz - Laravel Package

> A package for SSLCommerz Payment Gateway \
<sub><sup>Inspired by [SSLCommerz](https://github.com/sslcommerz/SSLCommerz-Laravel)</sup></sub>

[![Software License](https://img.shields.io/badge/license-MIT-brightgreen.svg?style=flat-square)](LICENSE.md)
[![Latest Version on Packagist](https://img.shields.io/packagist/v/afzalsabbir/sslaracommerz.svg?style=flat-square)](https://packagist.org/packages/afzalsabbir/sslaracommerz)
[![Build Status](https://img.shields.io/travis/afzalsabbir/sslaracommerz/master.svg?style=flat-square)](https://travis-ci.org/afzalsabbir/sslaracommerz)
[![Quality Score](https://img.shields.io/scrutinizer/g/afzalsabbir/sslaracommerz.svg?style=flat-square)](https://scrutinizer-ci.com/g/afzalsabbir/sslaracommerz)
[![Total Downloads](https://img.shields.io/packagist/dt/afzalsabbir/sslaracommerz.svg?style=flat-square)](https://packagist.org/packages/afzalsabbir/sslaracommerz)

__Tags:__ Payment Gateway, SSLCommerz, IPN, Laravel, SSLaraCommerz

__Requires:__  Laravel >= 5.6 and MySQL

__License:__ MIT License

## Install

```bash
composer require afzalsabbir/sslaracommerz
```

## Vendor Publish

### Required

<span id="public-assets">

```bash
# Public Assets
php artisan vendor:publish --provider="AfzalSabbir\SSLaraCommerz\SSLaraCommerzServiceProvider" --tag="public-assets"
```

</span>

### Optional

<span id="config-views-migrations">

```bash
# Config
php artisan vendor:publish --provider="AfzalSabbir\SSLaraCommerz\SSLaraCommerzServiceProvider" --tag="config"

# Views
## Namespace: sslaracommerz
php artisan vendor:publish --provider="AfzalSabbir\SSLaraCommerz\SSLaraCommerzServiceProvider" --tag="views"

# Migrations
php artisan vendor:publish --provider="AfzalSabbir\SSLaraCommerz\SSLaraCommerzServiceProvider" --tag="migrations"
```

</span>

## Instructions

* __Step 1:__ Install the package using composer command. _(i.e. `composer require afzalsabbir/sslaracommerz`)_

[//]: # (* __Step 2:__ Copy the `Library` folder and put it in the laravel project's `app/` directory. If needed, then run `composer dump -o`.)

* __Step 3:__ Copy the `config/sslcommerz.php` file into your project's `config/` folder.

Now, we have already copied the core library files. Let's do copy some other helpers files that is provided to
understand the integration process. The other files are not related to core library.

* __Optional:__ If you later encounter issues with session destroying after redirect, you can
  set ```'same_site' => null,``` in your `config/session.php` file.

* __Step 4:__ Add `STORE_ID` and `STORE_PASSWORD` values on your project's `.env` file. You can register for a store
  at [https://developer.sslcommerz.com/registration/](https://developer.sslcommerz.com/registration/)

[//]: # (* __Step 5:__ Copy the `SslCommerzPaymentController` into your project's `Controllers` folder.)

* __Step 6:__ Copy the defined routes from `routes/web.php` into your project's route file.

* __Step 7:__ Add the below routes into the `$excepts` array of `VerifyCsrfToken` middleware.

```php
protected $except = [
    '/pay-via-ajax', '/success','/cancel','/fail','/ipn'
];
```

* __Step 8:__ Copy the `resources/views/*.blade.php` files into your project's `resources/views/` folder.

Now, let's go to the main integration part.

* __Step 9:__ To integrate popup checkout, use the below script before the end of body tag.

##### For Sandbox

```html
<script>
    (function (window, document) {
        var loader = function () {
            var script = document.createElement("script"),
                tag    = document.getElementsByTagName("script")[0];
            script.src = "https://sandbox.sslcommerz.com/embed.min.js?" + Math.random().toString(36).substring(7);
            tag.parentNode.insertBefore(script, tag);
        };

        window.addEventListener ? window.addEventListener("load", loader, false) : window.attachEvent("onload", loader);
    })(window, document);
</script>
```

> or, Publish the [Public Assets](#public-assets) and use the below `sandbox` script

```html

<script src="/assets/js/sandbox.js"></script>
```

---

##### For Live

```html
<script>
    (function (window, document) {
        var loader = function () {
            var script = document.createElement("script"),
                tag    = document.getElementsByTagName("script")[0];
            script.src = "https://seamless-epay.sslcommerz.com/embed.min.js?" + Math.random().toString(36).substring(7);
            tag.parentNode.insertBefore(script, tag);
        };

        window.addEventListener ? window.addEventListener("load", loader, false) : window.attachEvent("onload", loader);
    })(window, document);
</script>
```

> or, Publish the [Public Assets](#public-assets) and use the below `live` script

```html
<script src="/assets/js/live.js"></script>
```

* __Step 10:__ Use the below button where you want to show the **"Pay Now"** button:

```html

<button class="your-button-class" id="sslczPayBtn"
        token="if you have any token validation"
        postdata="your javascript arrays or objects which requires in backend"
        order="If you already have the transaction generated for current order"
        endpoint="/pay-via-ajax"> Pay Now
</button>
```

* __Step 11:__ For EasyCheckout (Popup) integration, you can update the `checkout_ajax.php` or use a different file
  according to your need. We have provided a basic sample page from where you can kickstart the payment gateway
  integration.

* __Step 12:__ For Hosted Checkout integration, you can update the `checkout_hosted.php` or use a different file
  according to your need. We have provided a basic sample page from where you can kickstart the payment gateway
  integration.

* __Step 13:__ For redirecting action from SSLCommerz Payment gateway, we have also provided sample `success.php`
  , `cancel.php`, `fail.php`files. You can update those files according to your need.

## Testing

Run the tests with:

```bash
vendor/bin/phpunit
```

## Contributing

Please see [CONTRIBUTING](CONTRIBUTING.md) for details.

## Security

If you discover any security-related issues, please email afzalbd1@gmail.com instead of using the issue tracker.

## License

The MIT License (MIT). Please see [License File](LICENSE.md) for more information.
