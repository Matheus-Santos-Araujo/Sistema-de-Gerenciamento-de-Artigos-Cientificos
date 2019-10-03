<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;

class artigoModelServiceProvider extends ServiceProvider
{
    /**
     * Bootstrap the application services.
     *
     * @return void
     */
    public function boot()
    {
        \App\artigo::observe(\App\Observer\NotifyObserver::class);
    }

    /**
     * Register the application services.
     *
     * @return void
     */
    public function register()
    {
        //
    }
}
