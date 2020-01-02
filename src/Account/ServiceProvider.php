<?php

namespace AsLong\YunPay\Account;

use Pimple\Container;
use Pimple\ServiceProviderInterface;

class ServiceProvider implements ServiceProviderInterface
{

    public function register(Container $pimple)
    {
        $pimple['account'] = function ($app) {
            return new Client($app);
        };
    }

}