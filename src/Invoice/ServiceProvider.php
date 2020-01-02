<?php

namespace AsLong\YunPay\Invoice;

use Pimple\Container;
use Pimple\ServiceProviderInterface;

class ServiceProvider implements ServiceProviderInterface
{

    public function register(Container $pimple)
    {
        $pimple['invoice'] = function ($app) {
            return new Client($app);
        };
    }

}