<?php

namespace AsLong\YunPay\Kernel;

use Pimple\Container;
use Pimple\ServiceProviderInterface;

class ServiceProvider implements ServiceProviderInterface
{

    public function register(Container $app)
    {
        $app['client'] = function () {
            return new Client([
                'base_uri' => 'https://api-jiesuan.yunzhanghu.com',
                'headers'  => [
                    'Content-Type' => 'application/json',
                ],
                'timeout'  => 5.0,
            ]);
        };
    }

}