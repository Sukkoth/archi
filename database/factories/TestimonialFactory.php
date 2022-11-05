<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

class TestimonialFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'fullName' => $this->faker->firstName() . ' ' . $this->faker->lastName(),
            'email' => $this->faker->safeEmail(),
            'testimony' => $this->faker->paragraph($nbSentences = 6),

        ];
    }
}
