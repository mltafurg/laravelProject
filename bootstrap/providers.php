<?php

use App\Providers\AppServiceProvider;
use App\Providers\ImageServiceProvider;

return [
    AppServiceProvider::class,
    ImageServiceProvider::class,
];
// retorna el nombre de los archivos que laravel debe ejecutar al iniciarse