<?php

namespace AsLong\YunPay\Account;

use AsLong\YunPay\Kernel\BaseClient;
use AsLong\YunPay\Kernel\Routers;

class Client extends BaseClient
{

    /**
     * Notes: 获取余额
     * @Author: <C.Jason>
     * @Date: 2020/1/2 11:09 上午
     * @return mixed
     */
    public function balance()
    {
        return $this->client->get(Routers::QUERY_BALANCE, [
            'mess'      => uniqid(),
            'sign_type' => 'sha256',
            'timestamp' => time(),
            'data'      => '',
            'sign'      => '',
        ]);
    }

}