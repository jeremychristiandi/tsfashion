<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Model>
 */
class ProductFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            "name" => $this->faker->words(mt_rand(1,4), true),
            "price" => $this->faker->numberBetween(50000, 700000),
            "description" => $this->faker->sentence(mt_rand(3, 15)),
            "category_id" => mt_rand(1,2)
        ];
    }
}
