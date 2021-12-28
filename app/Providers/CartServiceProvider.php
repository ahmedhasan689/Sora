<?php

namespace App\Providers;

use App\Repositories\Cart\CartRepository;
use App\Repositories\Cart\SessionRepository;
use App\Repositories\Cart\CookieRepository;
use App\Repositories\Cart\DatabaseRepository;
use Illuminate\Support\ServiceProvider;

class CartServiceProvider extends ServiceProvider
{
    /**
     * Register services.
     *
     * @return void
     */
    public function register()
    {
        // app = Service Container
        $this->app->bind(CartRepository::class, function() {
            if (config('cart.drive') == 'session'){
                return new SessionRepository();
            }
            if (config('cart.drive') == 'cookie'){
                return new CookieRepository();
            }

            return new DatabaseRepository();
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
