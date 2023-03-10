<?php
namespace Yxx\LaravelAlpineComponents\Providers;

use Illuminate\Support\Facades\Blade;
use Illuminate\Support\Facades\Route;
use Illuminate\Support\ServiceProvider;
class LaravelAlpineComponentServiceProvider extends ServiceProvider
{
    public function register()
    {
        if ($this->app->isLocal()) {
            $this->registerRoute();
        }
    }

    public function boot()
    {
        $this->registerComponent();
        $this->registerPublishing();
    }

    public function registerComponent()
    {
        $this->loadViewsFrom(__DIR__.'/../../resources/views', 'alp');
        Blade::component('alp::components.combobox', 'alp-combobox');
        Blade::component('alp::components.remote-combobox', 'alp-remote-combobox');
        Blade::component('alp::components.select', 'alp-select');
    }

    public function registerRoute()
    {
        Route::middleware('web')
            ->group(__DIR__.'/../Routes/web.php');
    }

    private function registerPublishing()
    {
        if ($this->app->runningInConsole()) {
            $this->publishes([
                __DIR__.'/../../resources/dist' => public_path('vendor/laravel-alpine-components'),
            ], ['laravel-alpine-components-assets']);
        }
    }
}