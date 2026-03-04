<?php

namespace Mhshagor\LaravelComponents\Providers;

use Illuminate\Support\ServiceProvider;
use Illuminate\Support\Facades\Blade;

class PackageServiceProvider extends ServiceProvider
{
    protected $basePath = __DIR__ . '/../../';

    protected $packages = [
        'components',
        'file-picker'
    ];
    
    private function publishPackage($package)
    {
        if($package === 'all') {
            $this->publishAll();
            return;
        }
        $paths = match($package) {
            'components' => $this->publishComponents($package),
            'file-picker' => $this->publishFilePicker($package),
            default => throw new \Exception("Unknown package: {$package}"),
        };
        
        $this->publishes($paths, $package);
    }

    private function publishAll()
    {
        $paths = [
            ...$this->publishComponents('components'),
            ...$this->publishFilePicker('file-picker'),
        ];
        
        $this->publishes($paths, 'all');
    }

    private function publishComponents($package)
    {
        return [
            $this->basePath . '/assets/demo' => resource_path('views/sgd'),
            $this->basePath . '/assets/js' => resource_path('js/sgd'),
            $this->basePath . '/assets/css' => resource_path('css/sgd'),
            $this->basePath . '/assets/components' => resource_path('views/components'),
        ];
    }
    
    private function publishFilePicker($package)
    {
        return [
            $this->basePath . '/../file-picker/assets/demo' => resource_path('views/sgd'),
            $this->basePath . '/../file-picker/assets/js' => resource_path('js/sgd'),
            $this->basePath . '/../file-picker/assets/css' => resource_path('css/sgd'),
            $this->basePath . '/../file-picker/assets/components' => resource_path('views/components'),
        ];
    }


    public function boot()
    {
        foreach ($this->packages as $package) {
            $this->publishPackage($package);
        }
        $this->publishAll();
    }
    
    public function register()
    {
        // Components will be auto-discovered via Laravel's component discovery
    }
}
