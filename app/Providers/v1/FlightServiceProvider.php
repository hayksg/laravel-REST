<?php

namespace App\Providers\v1;

use Illuminate\Support\ServiceProvider;
use Illuminate\Support\Facades\Validator;
use App\Services\v1;

class FlightServiceProvider extends ServiceProvider
{
    /**
     * Bootstrap services.
     *
     * @return void
     */
    public function boot()
    {
        Validator::extend('flightstatus', function($attribute, $value, $parameters, $validator){
            return $value == 'ontime' || $value == 'delayed';
        });
    }

    /**
     * Register services.
     *
     * @return void
     */
    public function register()
    {
        // We pass $app here in order to use it later if we want
        $this->app->bind(FlightService::class, function($app){
            return new FlightService();
        });
    }
}
