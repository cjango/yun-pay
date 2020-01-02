<?php

namespace AsLong\YunPay\Kernel;

use GuzzleHttp\Client as GuzzleHttp;
use Pimple\Container;

class Client
{

    protected $client;

    public function __construct(Container $app)
    {
        $this->client = new GuzzleHttp([
            'base_uri' => Routers::SERVICE_URL,
            'headers'  => [
                'dealer-id'  => $app['config']->get('dealer-id'),
                'request-id' => uniqid(),
            ],
            'timeout'  => 5.0,
        ]);
    }

    public function get($uri, array $query = [])
    {
        return $this->client->get($uri, ['query' => $query])->getBody()->getContents();
    }

}