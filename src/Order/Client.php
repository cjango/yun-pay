<?php

namespace AsLong\YunPay\Order;

use AsLong\YunPay\Kernel\BaseClient;
use AsLong\YunPay\Kernel\Routers;

class Client extends BaseClient
{

    /**
     * Notes: 银行卡实时下单
     * @Author: <C.Jason>
     * @Date: 2020/1/2 2:30 下午
     * @param $order_id
     * @param $real_name
     * @param $card_no
     * @param $id_card
     * @param $pay
     * @param string $pay_remark
     * @param null $notify_url
     * @return mixed
     */
    public function realtime($order_id, $real_name, $id_card, $card_no, $pay, $pay_remark = '', $notify_url = null)
    {
        $data = [
            'order_id'   => $order_id,
            'dealer_id'  => $this->app->config->get('dealer_id'),
            'broker_id'  => $this->app->config->get('broker_id'),
            'real_name'  => $real_name,
            'card_no'    => $card_no,
            'id_card'    => $id_card,
            'pay'        => $pay,
            'pay_remark' => $pay_remark,
            'notify_url' => $notify_url ?: $this->app->config->get('notify_url'),
        ];

        return $this->client->post(Routers::BANK_CARD, $data);
    }

    /**
     * Notes: 支付宝付款
     * @Author: <C.Jason>
     * @Date: 2020/1/2 2:38 下午
     * @param $order_id
     * @param $real_name
     * @param $card_no
     * @param $id_card
     * @param $pay
     * @param string $check_name
     * @param string $pay_remark
     * @param null $notify_url
     * @return mixed
     */
    public function alipay($order_id, $real_name, $id_card, $card_no, $pay, $check_name = 'NoCheck', $pay_remark = '', $notify_url = null)
    {
        $data = [
            'order_id'   => $order_id,
            'dealer_id'  => $this->app->config->get('dealer_id'),
            'broker_id'  => $this->app->config->get('broker_id'),
            'real_name'  => $real_name,
            'id_card'    => $id_card,
            'card_no'    => $card_no,
            'pay'        => $pay,
            'pay_remark' => $pay_remark,
            'check_name' => $check_name,
            'notify_url' => $notify_url ?: $this->app->config->get('notify_url'),
        ];

        return $this->client->post(Routers::ALI_PAY, $data);
    }

    /**
     * Notes: 微信付款
     * @Author: <C.Jason>
     * @Date: 2020/1/2 2:38 下午
     * @param $order_id
     * @param $real_name
     * @param $openid
     * @param $id_card
     * @param $pay
     * @param string $notes
     * @param string $pay_remark
     * @param null $notify_url
     * @param string $mode
     * @return mixed
     */
    public function wxpay($order_id, $real_name, $id_card, $openid, $pay, $notes = '', $pay_remark = '', $notify_url = null, $mode = 'transfer')
    {
        $data = [
            'order_id'   => $order_id,
            'dealer_id'  => $this->app->config->get('dealer_id'),
            'broker_id'  => $this->app->config->get('broker_id'),
            'real_name'  => $real_name,
            'id_card'    => $id_card,
            'openid'     => $openid,
            'pay'        => $pay,
            'notes'      => $notes,
            'pay_remark' => $pay_remark,
            'notify_url' => $notify_url ?: $this->app->config->get('notify_url'),
            'wx_app_id'  => $this->app->config->get('wx_app_id'),
            'wxpay_mode' => $mode,
        ];

        return $this->client->post(Routers::WX_PAY, $data);
    }

    /**
     * Notes: 取消待打款订单
     * @Author: <C.Jason>
     * @Date: 2020/1/2 2:26 下午
     * @param $order_id
     * @param string $channel 银行卡，⽀支付宝，微信(不不填时为银行卡订 单查询)(选填)
     * @return mixed
     */
    public function cancel(string $order_id, $channel = '银行卡')
    {
        $data = [
            'dealer_id' => $this->app->config->get('dealer_id'),
            'order_id'  => $order_id,
            'channel'   => $channel,
            'data_type' => '',
        ];

        return $this->client->get(Routers::ORDER_FAIL, $data);
    }

    /**
     * Notes: 查询一个订单
     * @Author: <C.Jason>
     * @Date: 2020/1/2 2:21 下午
     * @param string $order_id 订单号
     * @param string $channel 银行卡，⽀支付宝，微信(不不填时为银行卡订 单查询)(选填)
     * @return mixed
     */
    public function query(string $order_id, $channel = '银行卡')
    {
        $data = [
            'order_id'  => $order_id,
            'channel'   => $channel,
            'data_type' => '',
        ];

        return $this->client->get(Routers::QUERY_REALTIME_ORDER, $data);
    }

    /**
     * Notes: 查询电⼦子回单
     * @Author: <C.Jason>
     * @Date: 2020/1/2 2:23 下午
     * @param string $order_id 商户订单号
     * @param string $ref 平台订单号
     * @return mixed
     */
    public function receipt(string $order_id, string $ref = '')
    {
        $data = [
            'order_id' => $order_id,
            'ref'      => $ref,
        ];

        return $this->client->get(Routers::RECEIPT_FILE, $data);
    }

}