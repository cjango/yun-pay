<?php

namespace AsLong\YunPay\Balance;

use Pimple\Container;
use Pimple\ServiceProviderInterface;

class ServiceProvider implements ServiceProviderInterface
{

    public function register(Container $pimple)
    {
        $pimple['balance'] = function ($app) {
            return new Client($app);
        };
    }

}