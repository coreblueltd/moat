<?php

namespace CoreBlue\Moat;

use Illuminate\Support\ServiceProvider;

class MoatServiceProvider extends ServiceProvider
{
    /**
     * Bootstrap services.
     *
     * @return void
     */
    public function boot()
    {
        include __DIR__.'/routes.php';
        include __DIR__.'/Middleware/ApplyMoat.php';
    }

    /**
     * Register services.
     *
     * @return void
     */
    public function register()
    {
        $this->app->make('CoreBlue\Moat\Controllers\MoatController');
        $this->loadViewsFrom(__DIR__.'/views', 'Moat');
    }
}
