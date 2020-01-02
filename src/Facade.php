<?php

namespace AsLong\YunPay;

use Illuminate\Support\Facades\Facade as LaravelFacade;

class Facade extends LaravelFacade
{

    public static function getFacadeAccessor()
    {
        return 'yun_pay';
    }

}