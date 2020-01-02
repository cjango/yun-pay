<?php

namespace AsLong\YunPay\Auth;

use AsLong\YunPay\Kernel\BaseClient;
use AsLong\YunPay\Kernel\Routers;

class Client extends BaseClient
{

    public function idCard($cardNo, $realName)
    {
        $data = [
            'id_card'   => $cardNo,
            'real_name' => $realName,
        ];

        return $this->client->post(Routers::VERIFY_ID, $data);
    }

}