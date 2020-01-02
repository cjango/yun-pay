<?php

namespace AsLong\YunPay\Auth;

use AsLong\YunPay\Kernel\BaseClient;
use AsLong\YunPay\Kernel\Routers;

class Client extends BaseClient
{

    /**
     * Notes: 身份证实名认证
     * @Author: <C.Jason>
     * @Date: 2020/1/2 2:29 下午
     * @param $cardNo
     * @param $realName
     * @return mixed
     */
    public function idCard($cardNo, $realName)
    {
        $data = [
            'id_card'   => $cardNo,
            'real_name' => $realName,
        ];

        return $this->client->post(Routers::VERIFY_ID, $data);
    }

    /**
     * Notes: 银行卡四要素请求鉴权
     * @Author: <C.Jason>
     * @Date: 2020/1/2 3:05 下午
     * @param $cardNo
     * @param $idCard
     * @param $realName
     * @param $mobile
     * @return mixed
     */
    public function request($cardNo, $idCard, $realName, $mobile)
    {
        $data = [
            'card_no'   => $cardNo,
            'id_card'   => $idCard,
            'real_name' => $realName,
            'mobile'    => $mobile,
        ];

        return $this->client->post(Routers::VERIFY_REQUEST, $data);
    }

    /**
     * Notes: 银行卡四要素确认鉴权
     * @Author: <C.Jason>
     * @Date: 2020/1/2 3:05 下午
     * @param $cardNo
     * @param $idCard
     * @param $realName
     * @param $mobile
     * @param $ref
     * @param $captcha
     * @return mixed
     */
    public function confirm($cardNo, $idCard, $realName, $mobile, $ref, $captcha)
    {
        $data = [
            'card_no'   => $cardNo,
            'id_card'   => $idCard,
            'real_name' => $realName,
            'mobile'    => $mobile,
            'captcha'   => $captcha,
            'ref'       => $ref,
        ];

        return $this->client->post(Routers::VERIFY_CONFIRM, $data);
    }

    /**
     * Notes: 银行卡四要素
     * @Author: <C.Jason>
     * @Date: 2020/1/2 3:01 下午
     * @param $cardNo
     * @param $idCard
     * @param $realName
     * @param $mobile
     * @return mixed
     */
    public function bankcard_four($cardNo, $idCard, $realName, $mobile)
    {
        $data = [
            'card_no'   => $cardNo,
            'id_card'   => $idCard,
            'real_name' => $realName,
            'mobile'    => $mobile,
        ];

        return $this->client->post(Routers::VERIFY_BANKCARD_FOUR_FACTOR, $data);
    }

    /**
     * Notes: 银行卡三要素
     * @Author: <C.Jason>
     * @Date: 2020/1/2 3:01 下午
     * @param $cardNo
     * @param $idCard
     * @param $realName
     * @return mixed
     */
    public function bankcard_three($cardNo, $idCard, $realName)
    {
        $data = [
            'card_no'   => $cardNo,
            'id_card'   => $idCard,
            'real_name' => $realName,
        ];

        return $this->client->post(Routers::VERIFY_BANKCARD_THREE_FACTOR, $data);
    }

}