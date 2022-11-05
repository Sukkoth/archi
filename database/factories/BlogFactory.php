<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

class BlogFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'title' => $this->faker->sentence($nbWords = 6),
            'description' => $this->faker->paragraph($nbSentences = 8),
            'status' => $this->faker->randomElement($array = array('completed', 'editing')),
        ];
    }
}
