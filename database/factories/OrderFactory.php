<?php

namespace Database\Factories;

use App\Models\Client;
use App\Models\Product;
use App\Models\Variation;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Order>
 */
class OrderFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition()
    {
        return [
            'number' => fake()->randomNumber(),
            'product_id' => Product::factory(),
            'variation_id' => Variation::factory(),
            'client_id' => Client::factory(),
            'qty' => fake()->randomNumber(),

        ];
    }
}
