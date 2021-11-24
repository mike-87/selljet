<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

class AdFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'title' => $this->faker->sentence(3),
            'description' => $this->faker->paragraphs(2, true),
            'price' => $this->faker->randomFloat(2, 10, 5000),
            'condition' => $this->faker->randomElement(["1", "2"]),
            'phone' => $this->faker->tollFreePhoneNumber(),
            'location' => $this->faker->randomElement(["Beograd", "Kragujevac", "Leskovac", "Niš", "Novi Sad"]),
            'category_id' => $this->faker->numberBetween(12, 33),
            'owner' => $this->faker->numberBetween(2, 4)
        ];
    }
}
