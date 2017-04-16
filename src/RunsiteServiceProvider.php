<?php

namespace Goszowski\Runsite;

use Illuminate\Support\ServiceProvider;

class RunsiteServiceProvider extends ServiceProvider
{
    /**
     * Bootstrap the application services.
     *
     * @return void
     */
    public function boot(\Illuminate\Routing\Router $router)
    {
        include __DIR__ . '/routes.php';

        $this->loadViewsFrom(__DIR__ . '/resources/views', 'runsite');
        $this->loadTranslationsFrom(__DIR__.'/resources/lang', 'runsite');
        $router->middleware('runsite.auth', 'Goszowski\Runsite\Http\Middlewares\Authenticate');
    }

    /**
     * Register the application services.
     *
     * @return void
     */
    public function register()
    {
        // $this->app['runsite'] = $this->app->share(function ($app) {
        //   return new Runsite;
        // });

        $this->commands([
            Console\Setup::class,
        ]);
    }
}
