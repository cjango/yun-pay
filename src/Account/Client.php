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
        $data = [
            "dealer_id" => $this->app['config']->get('dealer_id'),
        ];

        return $this->client->get(Routers::QUERY_ACCOUNTS, $data);
    }

}