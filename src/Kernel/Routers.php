<?php

namespace AsLong\YunPay\Kernel;

class Routers
{

    const SERVICE_URL = 'https://api-jiesuan.yunzhanghu.com';
    //+----------------------------------
    //|  打款接口
    //+----------------------------------
    /**
     * 支付提交地址
     */
    const BANK_CARD = 'api/payment/v1/order-realtime';
    const ALI_PAY   = 'api/payment/v1/order-alipay';
    const WX_PAY    = 'api/payment/v1/order-wxpay';
    /**
     * 订单查询
     */
    const QUERY_REALTIME_ORDER = 'api/payment/v1/query-realtime-order';
    /**
     * 余额查询
     */
    const QUERY_ACCOUNTS = 'api/payment/v1/query-accounts';
    /**
     * 电子回单
     */
    const RECEIPT_FILE = 'api/payment/v1/receipt/file';
    /**
     * 取消待打款订单
     */
    const ORDER_FAIL = 'api/payment/v1/order/fail';

    //+----------------------------------
    //| 税务风控
    //+----------------------------------
    /**
     * 查看用户打款金额是否超出限额
     *
     */
    const RISK_CHECK_AMOUNT = 'api/payment/v1/risk-check/amount';
    //+----------------------------------
    //| 数据接口
    //+----------------------------------
    /**
     * 查询日订单文件
     */
    const ORDER_DOWNLOAD = 'api/dataservice/v1/order/downloadurl';
    /**
     * 查询日流水文件
     */
    const BILL_DOWNLOAD = 'api/dataservice/v2/bill/downloadurl';
    /**
     * 查询商户充值记录
     */
    const RECHARGE_RECORD = 'api/dataservice/v2/rechargerecord';
    //+----------------------------------
    //|  用户信息验证接口
    //+----------------------------------
    /**
     * 银行卡四要素请求鉴权（下发短信验证码）
     */
    const VERIFY_REQUEST = 'authentication/verify-request';
    /**
     * 银行卡四要素确认鉴权（上传短信验证码）
     */
    const VERIFY_CONFIRM = 'authentication/verify-confirm';
    /**
     * 银行卡四要素验证
     */
    const VERIFY_BANKCARD_FOUR_FACTOR = 'authentication/verify-bankcard-four-factor';
    /**
     * 银行卡三要素验证
     */
    const VERIFY_BANKCARD_THREE_FACTOR = 'authentication/verify-bankcard-three-factor';
    /**
     * 身份证实名验证
     */
    const VERIFY_ID = 'authentication/verify-id';
    /**
     * 查看用户白名单是否存在
     */
    const USER_WHITE_CHECK = 'api/payment/v1/user/white/check';
    //+----------------------------------
    //|  用户签约接口
    //+----------------------------------
    /**
     * 用户签约信息上传
     */
    const SIGN_USER = 'api/payment/v1/sign/user';
    /**
     * 获取用户签约状态
     */
    const SIGN_USER_STATUS = 'api/payment/v1/sign/user/status';
    //+----------------------------------
    //|  发票接口
    //+----------------------------------
    /**
     * 查询商户已开具发票金额和待开具发票金额
     */
    const INVOICE_STAT = 'api/payment/v1/invoice-stat';

}
