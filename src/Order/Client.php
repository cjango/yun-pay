<?php

namespace AsLong\YunPay\Order;

use AsLong\YunPay\Kernel\BaseClient;
use AsLong\YunPay\Kernel\Routers;

class Client extends BaseClient
{

    public function query($order_id, $channel = '银⾏卡')
    {
        $data = [
            'order_id'  => $order_id,
            'channel'   => $channel,
            'data_type' => '',
        ];

        return $this->client->get(Routers::QUERY_REALTIME_ORDER, $data);
    }

    public function receipt($order_id, $ref = '')
    {
        $data = [
            'order_id' => $order_id,
            'ref'      => $ref,
        ];

        return $this->client->get(Routers::RECEIPT_FILE, $data);
    }

}