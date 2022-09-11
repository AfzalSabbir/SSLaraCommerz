<?php

namespace AfzalSabbir\SSLaraCommerz;

use Illuminate\Support\Facades\Facade;

class SSLaraCommerzFacade extends Facade
{
    /**
     * Get the registered name of the component.
     *
     * @return string
     */
    protected static function getFacadeAccessor()
    {
        return 'SSLaraCommerz';
    }
}
