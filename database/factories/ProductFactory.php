<?php

namespace Database\Factories;

use App\Models\User;
use Illuminate\Database\Eloquent\Factories\Factory;

class ProductFactory extends Factory
{
    public function definition(): array
    {
        $categories = ['Electronics', 'Clothing', 'Books', 'Food', 'Toys', 'Sports'];

        return [
            'name' => fake()->words(3, true),
            'description' => fake()->paragraph(),
            'price' => fake()->randomFloat(2, 10, 1000),
            'stock' => fake()->numberBetween(0, 100),
            'category' => fake()->randomElement($categories),
            'is_active' => fake()->boolean(90), // 90% active
            'user_id' => User::factory(),
        ];
    }

    // State: Out of stock
    public function outOfStock()
    {
        return $this->state(fn (array $attributes) => [
            'stock' => 0,
        ]);
    }

    // State: Inactive
    public function inactive()
    {
        return $this->state(fn (array $attributes) => [
            'is_active' => false,
        ]);
    }
}