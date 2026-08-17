<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
//esto es una clase anonima que hereda de Migration, se utiliza para evitar la colision de nombres en la carpetamigrations
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('products', function (Blueprint $table) {

            // schema es aquel  que tiene la logica de las consultas de bases de datos guardadas
            // para que solo uno con los comandos de create (crea tabla nueva), modify o destroy realice lo q quiera
            // create recibe el nombre de la tabla a crear y una funcion anonima 
            // que recibe como parametro una instancia de blueprint q es la que define que tiene la tabla

            $table->id(); // clave primaria

            // establece los tipos de las columnas:

            $table->string('name');
            $table->integer('price');

            // important! esta funcion crea dos columnas: created_at, updated_at con tipo fecha!
            $table->timestamps();
        }
        ); // cierre funcion anonima
    }
    // metodo que se ejecuta al hacer el comando php artisan migrate
    // para construir la estrucutra de la BD


    /**
     * Reverse the migrations.
     * inverso del up(), elimina toda la estrucutra de una tabla
     */
    public function down(): void
    {
        Schema::dropIfExists('products'); // si existe products entonces se elimina
    }
}; // cierre de la clase anonima
