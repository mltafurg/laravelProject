<?php

namespace Database\Factories;

use App\Models\Product;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends Factory<Product>
 */
class ProductFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    // funcion para crear un registro de producto de prueba
    {
        return [
            // fake crea datos ficticios
            'name' => fake()->name(), // name crea nombres ficticios
            'price' => fake()->numberBetween(10, 100), // genera datos pero solo entre 10 y 100
        ];
    }
}
