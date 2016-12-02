<?php

namespace Moiz2050\Authy;

use Authy\AuthyApi;
use Illuminate\Support\ServiceProvider;

class AuthyServiceProvider extends ServiceProvider
{
    protected $config;
    /**
     * Bootstrap the application services.
     *
     * @return void
     */
    public function boot()
    {
        //
    }

    /**
     * Register the application services.
     *
     * @return void
     */
    public function register()
    {
        $this->app->singleton('authy', function () {

            if (!empty(config('authy.mode')) && (config('authy.mode') == 'sandbox')) {
                $this->config['api_key'] = config('authy.sandbox.key');
                $this->config['api_url'] = 'http://sandbox-api.authy.com';
            } else {
                $this->config['api_key'] = config('authy.live.key');
                $this->config['api_url'] = 'https://api.authy.com';
            }

            return new AuthyApi($this->config['api_key'], $this->config['api_url']);
        });
    }
}
