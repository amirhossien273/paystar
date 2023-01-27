<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use App;

class CartFacadesServiceProvider extends ServiceProvider
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
        App::bind('cart',function() {
            return new \App\services\cart\CartFacades;
         });
    }
}
