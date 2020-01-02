<?php

namespace AsLong\YunPay\Kernel;

use Pimple\Container;
use Pimple\ServiceProviderInterface;
use GuzzleHttp\Client as GuzzleHttp;

class Client
{

    protected $client;

    public function __construct()
    {
        $this->client = new GuzzleHttp([
            'base_uri' => 'https://api-jiesuan.yunzhanghu.com',
            'headers'  => [
                'Content-Type' => 'application/json',
            ],
            'timeout'  => 5.0,
        ]);
    }

    public function get($uri)
    {
        return $this->client->get($uri)->getBody()->getContents();
    }

}