<?php

namespace AsLong\YunPay\Kernel;

use AsLong\YunPay\Kernel\Exceptions\YunPayException;
use Pimple\Container;

class Util
{

    protected $config;

    public function __construct(Container $app)
    {
        $this->config = $app['config'];
    }

    /**
     * Notes: data=xxx&mess=xxx&timestamp=xxx&key=appkey
     * @Author: <C.Jason>
     * @Date: 2020/1/2 12:23 下午
     * @param array $signData
     * @param string $al
     * @return string
     */
    public function hmac(array $signData, string $al = 'sha256'): string
    {
        $signStr = urldecode(http_build_query($signData));

        return hash_hmac($al, $signStr, $this->config->get('app_key'));
    }

    public function encrypt($value)
    {
        $iv  = substr($this->config->get('des3_key'), 0, 8);
        $ret = openssl_encrypt(json_encode($value), 'DES-EDE3-CBC', $this->config->get('des3_key'), 0, $iv);
        if (false === $ret) {
            throw new YunPayException(openssl_error_string());
        }

        return $ret;
    }

    public function decrypt($value)
    {
        $iv  = substr($this->config->get('des3_key'), 0, 8);
        $ret = openssl_decrypt($value, 'DES-EDE3-CBC', $this->config->get('des3_key'), 0, $iv);
        if (false === $ret) {
            throw new YunPayException(openssl_error_string());
        }

        return $ret;
    }

}