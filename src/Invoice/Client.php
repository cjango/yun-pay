<?php

namespace AsLong\YunPay\Invoice;

use AsLong\YunPay\Kernel\BaseClient;
use AsLong\YunPay\Kernel\Routers;

class Client extends BaseClient
{

    /**
     * Notes: 查询日订单文件
     * @Author: <C.Jason>
     * @Date: 2020/1/2 2:49 下午
     * @param $year
     * @return mixed
     */
    public function stat(string $year)
    {
        $data = [
            'dealer_id' => $this->config->get('dealer_id'),
            'broker_id' => $this->config->get('broker_id'),
            'year'      => $year,
        ];

        return $this->client->get(Routers::INVOICE_STAT, $data);
    }

}
