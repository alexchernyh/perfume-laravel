<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use Illuminate\Pagination\Paginator;
use Illuminate\Support\Facades\Blade;
use Illuminate\Support\Facades\Schema;

use Illuminate\Support\Facades\URL;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     *
     * @return void
     */
    public function register()
    {
        //
    }

    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot()
    {
        // Paginator::defaultView('view-name');
        // Paginator::defaultView('simple-bootstrap-4');
        // Schema::defaultStringLength(191);
        Paginator::useBootstrap();

        // URL::forceScheme('https');
 
        // Paginator::defaultSimpleView('view-name');
    }
}
