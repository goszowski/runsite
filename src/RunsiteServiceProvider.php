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
        $this->loadMigrationsFrom(__DIR__.'/resources/migrations');
        $router->aliasMiddleware('runsite.auth', 'Goszowski\Runsite\Http\Middlewares\Authenticate');

        $this->publishes([
            __DIR__.'/resources/export/public' => public_path('vendor/runsite'),
        ], 'runsite_public');

        // config(['auth.providers.users.model' => \Goszowski\Runsite\Models\User\User::class]);
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
            Console\Setup\Setup::class,
            Console\Model\ModelsList::class,
        ]);
    }
}
