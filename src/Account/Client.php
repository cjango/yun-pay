<?php

namespace AsLong\YunPay\Account;

use AsLong\YunPay\Kernel\BaseClient;

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
        return $this->client->get('api/payment/v1/query-accounts');
    }

}