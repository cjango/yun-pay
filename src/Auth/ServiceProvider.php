<?php

namespace AsLong\YunPay\Auth;

use Pimple\Container;
use Pimple\ServiceProviderInterface;

class ServiceProvider implements ServiceProviderInterface
{

    public function register(Container $pimple)
    {
        $pimple['auth'] = function ($app) {
            return new Client($app);
        };
    }

}