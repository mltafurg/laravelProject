<?php

use Illuminate\Support\Facades\Route;
/*
ponermos las rutas de la pagina web
se hace una peticion get que viene de la direccion principal de la pg web
es la ruta raiz
el otro parametro es adonde llega, llega al controller home
y con el @ decimos a que funcion es en esa clase.

FINALMENTE, la flechita es para poner un alias a esa ruta, para no
escribir todo eso otravez
*/
Route::get('/', 'App\Http\Controllers\HomeController@index')->name("home.index");

Route::get('/about', function () {
    $data1 = "About us - Online Store";
    $data2 = "About us";
    $description = "This is an about page ...";
    $author = "Developed by: Your Name";
    return view('home.about')->with("title", $data1)
      ->with("subtitle", $data2)
      ->with("description", $description)
      ->with("author", $author);

})  ->name("home.about");


Route::get('/products', 'App\Http\Controllers\ProductController@index')->name("product.index");
Route::get('/products/create', 'App\Http\Controllers\ProductController@create')->name("product.create");
Route::post('/products/save', 'App\Http\Controllers\ProductController@save')->name("product.save");
Route::get('/products/{id}', 'App\Http\Controllers\ProductController@show')->name("product.show");


