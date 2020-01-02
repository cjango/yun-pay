<?php

namespace AsLong\YunPay\Data;

use Pimple\Container;
use Pimple\ServiceProviderInterface;

class ServiceProvider implements ServiceProviderInterface
{

    public function register(Container $pimple)
    {
        $pimple['data'] = function ($app) {
            return new Client($app);
        };
    }

}