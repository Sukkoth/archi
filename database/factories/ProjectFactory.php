<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

class ProjectFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'title' => $this->faker->sentence($nbWords = 4),
            'category_id' => $this->faker->randomElement([1, 2, 3, 4, 5, 6, 7, 8]),
            'description' => $this->faker->paragraph($nbSentences = 10),
            'size' => $this->faker->randomDigitNot(0),
            'startDate' => $this->faker->date(),
            'endDate' => $this->faker->date(),
            'status' => $this->faker->randomElement(['started', 'ended', 'handed', 'constructed']),
            'location' =>$this->faker->randomElement(['Addis Ababa', 'Adama', 'Nekemte', 'Bahir Dar']), 

        ];
    }
}
