<?php

namespace AsLong\YunPay\Kernel;

use AsLong\YunPay\Kernel\Exceptions\YunPayException;
use Pimple\Container;

class Util
{

    protected $iv;

    protected $app_key;

    protected $des3_key;

    public function __construct(Container $app)
    {
        $config = $app['config'];

        $this->app_key  = $config['app_key'];
        $this->des3_key = $config['des3_key'];
        $this->iv       = substr($config['des3_key'], 0, 8);
    }

    /**
     * Notes: 接口签名
     * data=xxx&mess=xxx&timestamp=xxx&key=appkey
     * @Author: <C.Jason>
     * @Date: 2020/1/2 12:23 下午
     * @param array $signData
     * @return string
     */
    public function hmac(array $signData): string
    {
        $signStr = urldecode(http_build_query($signData));

        return hash_hmac('sha256', $signStr, $this->app_key);
    }

    /**
     * Notes: 数据加密
     * @Author: <C.Jason>
     * @Date: 2020/1/2 12:23 下午
     * @param array $value
     * @return string
     */
    public function encrypt(array $value)
    {
        $ret = openssl_encrypt(json_encode($value), 'DES-EDE3-CBC', $this->des3_key, 0, $this->iv);
        if (false === $ret) {
            throw new YunPayException(openssl_error_string());
        }

        return $ret;
    }

    /**
     * Notes: 数据解密
     * @Author: <C.Jason>
     * @Date: 2020/1/2 12:23 下午
     * @param string $value
     * @return array
     */
    public function decrypt(string $value)
    {
        $ret = openssl_decrypt($value, 'DES-EDE3-CBC', $this->des3_key, 0, $this->iv);
        if (false === $ret) {
            throw new YunPayException(openssl_error_string());
        }

        return json_decode($ret, true);
    }

}
