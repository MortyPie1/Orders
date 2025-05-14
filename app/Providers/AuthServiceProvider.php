<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use App\Policies\OrderPolicy;
use App\Models\Order;

class AuthServiceProvider extends ServiceProvider
{
    protected $policies = [
        Order::class => OrderPolicy::class,
    ];
    /**
     * Register services.
     */
    public function register(): void
    {
        //
    }

    /**
     * Bootstrap services.
     */
    public function boot(): void
    {
        //
    }
}
