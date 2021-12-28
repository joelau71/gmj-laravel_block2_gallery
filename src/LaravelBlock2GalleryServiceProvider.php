<?php

namespace GMJ\LaravelBlock2Gallery;

use GMJ\LaravelBlock2Gallery\View\Components\Frontend;
use GMJ\LaravelBlock2Gallery\View\Components\Item;
use Illuminate\Support\Facades\Blade;
use Illuminate\Support\ServiceProvider;

class LaravelBlock2GalleryServiceProvider extends ServiceProvider
{
    public function boot()
    {
        $this->loadMigrationsFrom(__DIR__ . '/database/migrations');
        $this->loadRoutesFrom(__DIR__ . "/routes/web.php", 'LaravelBlock2Gallery');
        $this->loadViewsFrom(__DIR__ . '/resources/views', 'LaravelBlock2Gallery');
        $this->loadViewsFrom(__DIR__ . '/resources/views/config', 'LaravelBlock2Gallery.config');

        Blade::component("LaravelBlock2Gallery", Frontend::class);
        Blade::component("LaravelBlock2GalleryItem", Item::class);

        $this->publishes([
            __DIR__ . '/config/laravel_block2_gallery_config.php' => config_path('gmj/laravel_block2_gallery_config.php'),
            __DIR__ . '/resources/assets' => public_path('gmj'),
            __DIR__ . '/database/seeders' => database_path('seeders'),
        ], 'GMJ\LaravelBlock2Gallery');
    }


    public function register()
    {
    }
}
