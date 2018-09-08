<?php

namespace CoreBlue\Moat;

use Illuminate\Support\ServiceProvider;

class MoatServiceProvider extends ServiceProvider
{
    protected $commands = [
        'CoreBlue\Moat\Commands\CreateMoat',
        'CoreBlue\Moat\Commands\EnableMoat',
        'CoreBlue\Moat\Commands\DisableMoat',
        'CoreBlue\Moat\Commands\SetPassword',
        'CoreBlue\Moat\Commands\MoatStatus',
    ];

    /**
     * Bootstrap services.
     *
     * @return void
     */
    public function boot()
    {
        if(env('MOAT_STATUS') !== 'disabled') {
            include __DIR__.'/routes.php';
            include __DIR__.'/Middleware/ApplyMoat.php';
        }

        $this->commands($this->commands);
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
