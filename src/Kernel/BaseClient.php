<?php

namespace AsLong\YunPay\Kernel;

use Pimple\Container;

class BaseClient
{

    /**
     * @var
     */
    protected $app;

    /**
     * @var
     */
    protected $client;

    /**
     * Client constructor.
     *
     * @param
     */
    public function __construct(Container $app)
    {
        $this->app    = $app;
        $this->client = $this->app->client;
    }

}
