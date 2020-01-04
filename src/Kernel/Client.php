<?php

namespace AsLong\YunPay\Kernel;

use AsLong\YunPay\Kernel\Exceptions\YunPayException;
use GuzzleHttp\Client as GuzzleHttp;
use Pimple\Container;

class Client
{

    protected $app;

    protected $client;

    public function __construct(Container $app)
    {
        $this->app    = $app;
        $this->client = new GuzzleHttp([
            'base_uri' => Routers::SERVICE_URL,
            'headers'  => [
                'dealer-id'  => $app->config->get('dealer_id'),
                'request-id' => uniqid(),
            ],
            'timeout'  => 5.0,
        ]);
    }

    public function get(string $uri, array $data = [])
    {
        $response = $this->client->get($uri, ['query' => $this->params($data)]);

        return $this->transformResponse($response);
    }

    public function post(string $uri, array $data = [])
    {
        $response = $this->client->post($uri, ['form_params' => $this->params($data)]);

        return $this->transformResponse($response);
    }

    protected function transformResponse($response)
    {
        $result = json_decode($response->getBody()->getContents(), true);

        if ($result['code'] == '0000') {
            if (isset($result['data'])) {
                return $result['data'];
            } else {
                return true;
            }
        } else {
            throw new YunPayException($result['message'], $result['code']);
        }
    }

    /**
     * 综合数据签名
     * @param  array $data
     * @return array
     */
    private function params($data)
    {
        $mess      = uniqid();
        $data      = $this->app->util->encrypt($data);
        $timestamp = time();

        return [
            'mess'      => $mess,
            'sign_type' => 'sha256',
            'timestamp' => $timestamp,
            'data'      => $data,
            'sign'      => $this->app->util->hmac([
                'data'      => $data,
                'mess'      => $mess,
                'timestamp' => $timestamp,
                'key'       => $this->app->config->get('app_key'),
            ]),
        ];
    }

}
