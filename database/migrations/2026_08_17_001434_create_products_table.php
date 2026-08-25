<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
    // this is an anonymous class that extends Migration, used to avoid name collisions in the migrations folder
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('products', function (Blueprint $table) {

            // schema is the one that holds the logic for the database queries
            // so that only someone using the create (creates a new table), modify, or destroy commands can do what they want
            // create receives the name of the table to create and an anonymous function
            // which receives as a parameter an instance of blueprint, which defines what the table contains

            $table->id(); // primary key

            // sets the column types:

            $table->string('name');
            $table->integer('price');

            // important! this function creates two columns: created_at, updated_at with date type!
            $table->timestamps();
        }
        ); // closing of the anonymous function
    }
    // method that runs when executing the php artisan migrate command
    // to build the DB structure

    /**
     * Reverse the migrations.
     * the reverse of up(), removes the entire structure of a table
     */
    public function down(): void
    {
        Schema::dropIfExists('products'); // si existe products entonces se elimina
    }
};  // closing of the anonymous class
