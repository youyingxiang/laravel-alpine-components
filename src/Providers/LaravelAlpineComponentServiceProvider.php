<?php
namespace Yxx\LaravelAlpineComponents\Providers\LaravelAlpineComponentServiceProvider;

use Illuminate\Support\Facades\Blade;
use Illuminate\Support\ServiceProvider;
class LaravelAlpineComponentServiceProvider extends ServiceProvider
{
    public function boot()
    {
        $this->loadViewsFrom(__DIR__.'/../resources/views', 'laravel-alpine');
        Blade::component('laravel-alpine::components.combobox', 'alp-combobox');
    }
}