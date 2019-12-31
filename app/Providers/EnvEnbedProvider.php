<?php

namespace App\Providers;

use Illuminate\Support\Facades\View;
use Illuminate\Support\ServiceProvider;


class EnvEnbedProvider extends ServiceProvider
{
    /**
     * Register services.
     *
     * @return void
     */
    public function register()
    {
        //
    }

    /**
     * Bootstrap services.
     *
     * @return void
     */
    public function boot()
    {
        View::composer('layout', 'App\Http\Composers\EnbeddingComposer');
        View::composer('main.home', 'App\Http\Composers\EnbeddingComposer');
    }
}
