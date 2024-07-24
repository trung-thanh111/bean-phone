<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Model>
 */
class ProductCataloguesFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        // trả về các trường cần tạo record
        return [
            'name' => fake()->name,
            'image' => fake()->imageUrl(),
            'description' => fake()->paragraph,
            'publish' => fake()->boolean(100), // True or false with 90% chance of true
        ];
    }
}
