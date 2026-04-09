<?php

namespace Mhshagor\LaravelComponents\Providers;

use Illuminate\Support\ServiceProvider;
use Mhshagor\LaravelComponents\Commands\PublishAllCommand;

class PackageServiceProvider extends ServiceProvider
{
    protected $basePath = __DIR__ . '/../../';

    private const TAG_COMPONENTS = 'components';

    private function publishPaths(): array
    {
        return [
            $this->basePath . 'assets/demo' => resource_path('views/sgd'),
            $this->basePath . 'assets/js' => resource_path('js/vendor/components'),
            $this->basePath . 'assets/css' => resource_path('css/vendor/components'),
            $this->basePath . 'assets/components' => resource_path('views/components'),
        ];
    }


    public function boot()
    {
        if (! $this->app->runningInConsole()) {
            return;
        }

        $publishPaths = $this->publishPaths();

        $this->publishes($publishPaths, self::TAG_COMPONENTS);

        $this->commands([
            PublishAllCommand::class,
        ]);
    }

    public function register()
    {
        // Components will be auto-discovered via Laravel's component discovery
    }
}
