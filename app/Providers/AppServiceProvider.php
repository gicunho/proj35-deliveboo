<?php

namespace App\Providers;

use Illuminate\Support\Facades\Blade;
use Braintree\Gateway;
use Illuminate\Support\ServiceProvider;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     *
     * @return void
     */
    public function register()
    {
        //
    }

    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot()
    {
        $this->app->singleton(Gateway::class, function($app){
            return new Gateway(
                [
                    'environment' => 'sandbox',
                    'merchantId' => 'hp7cqf8qtnfz6934',
                    'publicKey' => 'bqd2xmfchxc844k4',
                    'privateKey' => 'b7de2d6c06d89c62f10a09f95b4d24c8',
                    'amount' => 2001,
                ]
            );
        });
    }
}
