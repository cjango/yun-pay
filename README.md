# YunPay 云账户

## 1.安装

> $ composer require aslong/yun-pay

> php artisan vendor:publish  --provider="AsLong\YunPay\ServiceProvider"

## 2.使用

```php

<?php

$app = app('yun_pay');
// 查询余额
$app->account->balance();
// 查询一条订单
$app->order->query($order_id, $channel = '银行卡');
// 银行卡下单
$app->order->realtime();
$app->order->alipay();
$app->order->wxpay();
$app->order->cancel();
$app->order->receipt();

$app->auth->idCard($cardNo, $realName);

$app->data->order($date);

$app->data->bill($date);

$app->data->record($begin_at, $end_at);

$app->invoice->stat($year);

$app->invoice->stat($year);
```

## 通知处理
```php
<?php

$app = app('yun_pay');

return $app->notify(function($message, $fail) {
    dd($message);
    return true;
    $fail('失败');

});
```
