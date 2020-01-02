<?php

namespace AsLong\YunPay\Kernel;


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
    public function __construct($app)
    {
        $this->app    = $app;
        $this->client = $this->app->client;
    }

}