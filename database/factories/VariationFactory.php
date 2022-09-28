<?php

namespace Database\Factories;

use App\Models\Product;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Variation>
 */
class VariationFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition()
    {
        return [
            'ref' => fake()->randomNumber(),
            'name' => fake()->name(),
            'product_id' => Product::factory(),
            'quantity' => fake()->randomNumber(),
            'price' => fake()->randomNumber(),
        ];
    }
}
