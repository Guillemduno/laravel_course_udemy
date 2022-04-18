<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

class BookFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            //
            'title' => $this->faker->title,
            'year' => $this->faker->numberBetween($min = 1000, $max = 2022),
            'pages' => $this->faker->numberBetween($min = 100, $max = 1000)
        ];
    }
}
