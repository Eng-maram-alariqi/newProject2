<?php

namespace App\Providers;

use App\Macros\EloquentBuilderMacros;
use Illuminate\Support\ServiceProvider;

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
        EloquentBuilderMacros::register();

    }
}
