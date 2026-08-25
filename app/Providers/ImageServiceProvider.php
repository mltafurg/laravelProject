<?php

namespace App\Providers;

use App\Interfaces\ImageStorage;
use App\Utils\ImageLocalStorage;
use Illuminate\Support\ServiceProvider;

class ImageServiceProvider extends ServiceProvider
{
    public function register(): void
    {
        $this->app->bind(ImageStorage::class, function () {
            return new ImageLocalStorage;
        });
    }
}
// this function runs when laravel is executed, making that everytime a controller calls the interface imagesotrage,
// returns the instance of imagelocalstorage
