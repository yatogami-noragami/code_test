<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Item>
 */
class ItemFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {

        $categories = [
            "Electronics", "Fashion and Accessories", "Home and Furniture", "Sports and Outdoors",
            "Garden and Tools", "Craftsmanship and Handmade", "Business and Industrial", "Education and Learning"
        ];
        return [
            'name' => $this->faker->word(),
            'category' => $this->faker->randomElement($categories),
            'price' => $this->faker->numberBetween($min = 10, $max = 1000),
            'description' => $this->faker->text($maxNbChars = 20),
        ];
    }
}
