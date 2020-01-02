<?php

include 'vendor/autoload.php';
include 'src/Application.php';

use AsLong\YunPay\Application;

$config = require './config/config.php';

$app = new Application();

var_dump($app);

