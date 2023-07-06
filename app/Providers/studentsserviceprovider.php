<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;

class studentsserviceprovider extends ServiceProvider
{


    /**
     * Register services.
     *
     * @return void
     */
    public function register()
    {
        $this->app->singleton(DatabaseService::class, function ($app) {
            return new DatabaseService();
        });
    }

    /**
     * Bootstrap services.
     *
     * @return void
     */
    public function boot()
    {
        //
    }
}
