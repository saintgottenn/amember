<?php

namespace App\Providers;

use App\Models\Cart;
use App\Models\Tool;
use App\Models\User;
use App\Models\Package;
use App\Models\Payment;
use App\Services\CartService;
use App\Observers\CartObserver;
use App\Observers\ToolObserver;
use App\Observers\UserObserver;
use App\Observers\PackageObserver;
use App\Observers\PaymentObserver;
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
        User::observe(UserObserver::class);
        Payment::observe(PaymentObserver::class);
    }
}
