<?php 

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use App\Interfaces\ImageStorage;
use App\Utils\ImageLocalStorage;

class ImageServiceProvider extends ServiceProvider
{
    public function register(): void
    {
        $this->app->bind(ImageStorage::class, function (){
            return new ImageLocalStorage();
        });
    }
}
// esta funcion se ejecuta cuando aaranca laravel, haciendo que cada vez que un controller llame a la interfaz
// imagestorage devuelva una instancia de imagelocalstorage 