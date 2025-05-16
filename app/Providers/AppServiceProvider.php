<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use Illuminate\Pagination\Paginator;
use Illuminate\Support\Facades\Blade;
use Illuminate\Support\Facades\Auth;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     */
    public function register(): void
    {
        //
    }

    /**
     * Bootstrap any application services.
     */
    public function boot(): void
    {
        //
        Paginator::useTailwind();
        Blade::if('admin', function () {
            return Auth::check() && Auth::user()->role === 'admin';
        });

        Blade::if('sale', function () {
            return Auth::check() && Auth::user()->role === 'sale';
        });
    }
}
