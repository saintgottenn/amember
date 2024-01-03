<?php

namespace App\Providers;

use App\Models\Cart;
use App\Models\Tool;
use App\Models\Package;
use App\Services\CartService;
use App\Observers\CartObserver;
use App\Observers\ToolObserver;
use App\Observers\PackageObserver;
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
        $this->app->singleton('cartService', function ($app) {
            return new CartService();
        });
    }

    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot()
    {
        Tool::observe(ToolObserver::class);
        Package::observe(PackageObserver::class);
        Cart::observe(CartObserver::class);
    }
}
