# SSLaraCommerz - Laravel Package

> A package for SSLCommerz Payment Gateway \
<sub><sup>Inspired by [SSLCommerz](https://github.com/sslcommerz/SSLCommerz-Laravel)</sup></sub> \
[SSLCommerz](https://www.sslcommerz.com) Payment gateway library for Laravel framework. Official documentation is [here](https://developer.sslcommerz.com/docs.html).

[![Software License](https://img.shields.io/badge/license-MIT-brightgreen.svg?style=flat-square)](LICENSE.md)
[![Latest Version on Packagist](https://img.shields.io/packagist/v/afzalsabbir/sslaracommerz.svg?style=flat-square)](https://packagist.org/packages/afzalsabbir/sslaracommerz)
[![Build Status](https://img.shields.io/travis/afzalsabbir/sslaracommerz/master.svg?style=flat-square)](https://travis-ci.org/afzalsabbir/sslaracommerz)
[![Quality Score](https://img.shields.io/scrutinizer/g/afzalsabbir/sslaracommerz.svg?style=flat-square)](https://scrutinizer-ci.com/g/afzalsabbir/sslaracommerz)
[![Commits Since](https://img.shields.io/github/commits-since/afzalsabbir/sslaracommerz/v0.0.1-alpha-0.svg?style=flat-square)]()

[![GitHub contributors](https://img.shields.io/github/contributors/afzalsabbir/sslaracommerz.svg?style=flat-square)]()
[![GitHub issues](https://img.shields.io/github/issues/afzalsabbir/sslaracommerz.svg?style=flat-square)]()
[![GitHub issues](https://img.shields.io/github/issues-closed/afzalsabbir/sslaracommerz.svg?style=flat-square)]()

[![GitHub forks](https://img.shields.io/github/forks/afzalsabbir/sslaracommerz.svg?style=flat-square)]()
[![GitHub stars](https://img.shields.io/github/stars/afzalsabbir/sslaracommerz.svg?style=flat-square)]()
[![GitHub watchers](https://img.shields.io/github/watchers/afzalsabbir/sslaracommerz.svg?style=social&label=Watch)]()
[![GitHub followers](https://img.shields.io/github/followers/afzalsabbir.svg?style=social&label=Follow)]()
[![Twitter Follow](https://img.shields.io/twitter/follow/afzalsabbir.svg?style=social)]()

[![Total Downloads](https://img.shields.io/packagist/dt/afzalsabbir/sslaracommerz.svg?style=flat-square)](https://packagist.org/packages/afzalsabbir/sslaracommerz)
[![GitHub code size in bytes](https://img.shields.io/github/languages/code-size/afzalsabbir/sslaracommerz.svg?style=flat-square)]()
[![GitHub repo size in bytes](https://img.shields.io/github/repo-size/afzalsabbir/sslaracommerz.svg?style=flat-square)]()

[![GitHub last commit](https://img.shields.io/github/last-commit/afzalsabbir/sslaracommerz.svg?style=flat-square)]()
[![GitHub commit activity the past week, 4 weeks, year](https://img.shields.io/github/commit-activity/y/afzalsabbir/sslaracommerz.svg?style=flat-square)]()
[![GitHub commit activity the past week, 4 weeks, year](https://img.shields.io/github/commit-activity/m/afzalsabbir/sslaracommerz.svg?style=flat-square)]()
[![GitHub commit activity the past week, 4 weeks, year](https://img.shields.io/github/commit-activity/w/afzalsabbir/sslaracommerz.svg?style=flat-square)]()

[//]: # ([![GitHub commit activity the past week, 4 weeks, year]&#40;https://img.shields.io/github/commit-activity/d/afzalsabbir/sslaracommerz.svg?style=flat-square&#41;]&#40;&#41;)

[![GitHub release](https://img.shields.io/github/release/afzalsabbir/sslaracommerz.svg?style=flat-square)]()
[![GitHub release date](https://img.shields.io/github/release-date/afzalsabbir/sslaracommerz.svg?style=flat-square)]()

[//]: # ([![GitHub All Releases]&#40;https://img.shields.io/github/downloads/afzalsabbir/sslaracommerz/total.svg?style=flat-square&#41;]&#40;&#41;)
[![GitHub tag](https://img.shields.io/github/tag/afzalsabbir/sslaracommerz.svg?style=flat-square)]()
[![GitHub release](https://img.shields.io/github/release-date-pre/afzalsabbir/sslaracommerz.svg?style=flat-square)]()
[![GitHub release](https://img.shields.io/github/release-date/afzalsabbir/sslaracommerz.svg?style=flat-square)]()

__Tags:__ Payment Gateway, SSLCommerz, IPN, Laravel, SSLaraCommerz

__Requires:__  Laravel >= 5.6 and MySQL

__License:__ MIT License

## Install

```php
composer require afzalsabbir/sslaracommerz
```

## Migration

```php
php artisan migrate
```

## Instructions

### Vendor Publish - _Required_

<span id="public-assets">

```bash
# Public Assets
php artisan vendor:publish --provider="AfzalSabbir\SSLaraCommerz\SSLaraCommerzServiceProvider" --tag="public-assets"
```

</span>

#### **Public Assets**: _To integrate popup checkout, use the below script before the end of body tag._

- For Sandbox

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

- For Live

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

<span id="routes-controller">

```bash
# Routes and Controller
php artisan vendor:publish --provider="AfzalSabbir\SSLaraCommerz\SSLaraCommerzServiceProvider" --tag="routes-controller"
```

</span>

#### **Routes and Controller**: _To customize the routes and controller, use the below command._
- Add `$this->loadRoutesFrom(base_path('routes/sslcommerz.php'));` in `app/Providers/RouteServiceProvider.php`
    ```php
    namespace App\Providers;
    
    // ...
    
    class RouteServiceProvider extends ServiceProvider
    {
        // ...
        public function boot()
        {
            // ...
            $this->loadRoutesFrom(base_path('routes/sslcommerz.php'));
        }
        // ...
    }
    ```
  
---

### Vendor Publish - _Optional_

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

> __Note:__ If you later encounter issues with session destroying after redirect, you can
  set ```'same_site' => null,``` in your `config/session.php` file.


* __Step 1:__ Add `STORE_ID` and `STORE_PASSWORD` values on your project's `.env` file. You can register for a store
  at [https://developer.sslcommerz.com/registration/](https://developer.sslcommerz.com/registration/)

* __Step 2:__ Add the below routes into the `$excepts` array of `VerifyCsrfToken` middleware.

    ```php
    protected $except = [
        '/pay-via-ajax', '/success','/cancel','/fail','/ipn'
    ];
    ```

Now, let's go to the main integration part.

* __Step 3:__ Use the below button where you want to show the **"Pay Now"** button:

    ```html
    <button class="your-button-class" id="sslczPayBtn"
            token="if you have any token validation"
            postdata="your javascript arrays or objects which requires in backend"
            order="If you already have the transaction generated for current order"
            endpoint="/pay-via-ajax"> Pay Now
    </button>
    ```
* __Step 4:__ For EasyCheckout (Popup) integration, you can update the `checkout_ajax.php` or use a different file
  according to your need. We have provided a basic sample page from where you can kickstart the payment gateway
  integration.

* __Step 5:__ For Hosted Checkout integration, you can update the `checkout_hosted.php` or use a different file
  according to your need. We have provided a basic sample page from where you can kickstart the payment gateway
  integration.

* __Step 6:__ For redirecting action from SSLCommerz Payment gateway, we have also provided sample `success.php`
  , `cancel.php`, `fail.php`files. You can update those files according to your need.

## Original Documentation

For more clear concept
read: [SSLCommerz README.md](https://github.com/sslcommerz/SSLCommerz-Laravel/blob/master/README.md)

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
