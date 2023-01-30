<?php

namespace Bitjosef\BladeLarasolIcons;

use Illuminate\Support\ServiceProvider;

class BladeLarasolIconsServiceProvider extends ServiceProvider
{
    public function register(): void
    {
        $this->registerConfig();

        $this->callAfterResolving(Factory::class, function (Factory $factory, Container $container) {
            $config = $container->make('config')->get('blade-larasol-icons', []);

            $factory->add('larasol-icons', array_merge(['path' => __DIR__.'/../resources/svg'], $config));
        });
    }

    private function registerConfig(): void
    {
        $this->mergeConfigFrom(__DIR__.'/../config/blade-larasol-icons.php', 'blade-larasol-icons');
    }

    public function boot(): void
    {
        if ($this->app->runningInConsole()) {
            $this->publishes([
                __DIR__.'/../resources/svg' => public_path('vendor/blade-larasol-icons'),
            ], 'blade-larasol-icons');

            $this->publishes([
                __DIR__.'/../config/blade-larasol-icons.php' => $this->app->configPath('blade-larasol-icons.php'),
            ], 'blade-larasol-icons-config');
        }
    }
}
