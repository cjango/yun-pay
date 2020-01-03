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

        $accounts = config('yun_pay.accounts');

        foreach ($accounts as $name => $config) {
            if ($name != 'default') {
                $name = 'yun_pay.' . $name;
            } else {
                $name = 'yun_pay';
            }
            $this->app->singleton($name, function ($laravelApp) use ($config) {
                $app            = new Application($config);
                $app['request'] = $laravelApp['request'];

                return $app;
            });
        }
    }

}