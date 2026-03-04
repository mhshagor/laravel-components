<?php

namespace Mhshagor\LaravelComponents\Providers;

use Illuminate\Support\ServiceProvider;
use Illuminate\Support\Facades\Blade;
use Mhshagor\LaravelComponents\Commands\PublishAllCommand;

class PackageServiceProvider extends ServiceProvider
{
    protected $basePath = __DIR__ . '/../../';

    protected $packages = [
        'components',
    ];
    
    private function publishPackage($package)
    {
        if($package === 'all') {
            $this->publishAll();
            return;
        }
        $paths = match($package) {
            'components' => $this->publishComponents($package),
            default => throw new \Exception("Unknown package: {$package}"),
        };
        
        $this->publishes($paths, $package);
    }

    private function publishAll()
    {
        $paths = [
            ...$this->publishComponents('components'),
        ];
        
        $this->publishes($paths, 'all');
    }

    private function publishComponents($package)
    {
        return [
            $this->basePath . 'assets/demo' => resource_path('views/sgd'),
            $this->basePath . 'assets/js' => resource_path('js/sgd'),
            $this->basePath . 'assets/css' => resource_path('css/sgd'),
            $this->basePath . 'assets/components' => resource_path('views/components'),
        ];
    }
    

    public function boot()
    {
        foreach ($this->packages as $package) {
            $this->publishPackage($package);
        }

        if ($this->app->runningInConsole()) {
            $this->commands([
                PublishAllCommand::class,
            ]);
        }
    }
    
    public function register()
    {
        // Components will be auto-discovered via Laravel's component discovery
    }
}
