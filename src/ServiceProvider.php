<?php

namespace AsLong\YunPay;

use Illuminate\Support\ServiceProvider as LaravelServiceProvider;

class ServiceProvider extends LaravelServiceProvider
{

    public function boot()
    {
        if ($this->app->runningInConsole()) {
            $this->publishes([__DIR__ . '/../config/config.php' => config_path('yun_pay.php')]);
        }
    }

    public function register()
    {
        $this->mergeConfigFrom(__DIR__ . '/../config/config.php', 'yun_pay');

        $config = config('yun_pay');

        $this->app->singleton("yun_pay", function ($laravelApp) use ($config) {
            $app = new Application($config);

            $app['request'] = $laravelApp['request'];

            return $app;
        });
    }

}