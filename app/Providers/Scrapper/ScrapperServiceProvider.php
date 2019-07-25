<?php

namespace App\Providers\Scrapper;

use Illuminate\Support\ServiceProvider;

class ScrapperServiceProvider extends ServiceProvider
{
    /**
     * Indicates if loading of the provider is deferred.
     *
     * @var bool
     */
    protected $defer = true;

    /**
     * Bootstrap services.
     *
     * @return void
     */
    public function boot()
    {
        //
    }

    /**
     * Register services.
     *
     * @return void
     */
    public function register()
    {
        $this->registerGoutte();
        $this->registerAliases();
    }

    protected function registerGoutte()
    {
        $this->app->singleton('scrapper', function($app){
            return new \Goutte\Client();
        });
    }

    protected function registerAliases()
    {
        $this->app->alias('scrapper', 'Goutte\Client');
    }

    /**
     * Get the services provided by the provider.
     *
     * @return array
     */
    public function provides()
    {
        return ['scrapper'];
    }
}
