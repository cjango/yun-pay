<?php

namespace AsLong\YunPay\Kernel;

use Pimple\Container;
use Pimple\ServiceProviderInterface;

class ServiceProvider implements ServiceProviderInterface
{

    public function register(Container $app)
    {
        $app['client'] = function () use ($app) {
            return new Client($app);
        };

        $app['util'] = function () use ($app) {
            return new Util($app);
        };
    }

}