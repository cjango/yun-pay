<?php

namespace AsLong\YunPay;

use Illuminate\Support\Collection;
use Pimple\Container;

class Application extends Container
{

    /**
     * @var array
     */
    protected $providers = [
        Kernel\ServiceProvider::class,
        Auth\ServiceProvider::class,
        Data\ServiceProvider::class,
        Order\ServiceProvider::class,
        Account\ServiceProvider::class,
        Invoice\ServiceProvider::class,
    ];

    /**
     * Application constructor.
     * @param array $config
     * @param array $values
     */
    public function __construct($config = [], array $values = [])
    {
        parent::__construct($values);

        $this['config'] = function () use ($config) {
            return new Collection($config);
        };

        foreach ($this->providers as $provider) {
            $this->register(new $provider());
        }
    }

    /**
     * @param $name
     *
     * @return mixed
     */
    public function __get($name)
    {
        return $this[$name];
    }

}