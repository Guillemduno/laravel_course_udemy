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
            'title' => $this->faker->sentence(10),
            'year' => $this->faker->numberBetween($min = 1900, $max = 2022),
            'pages' => $this->faker->numberBetween($min = 100, $max = 1000)
        ];
    }

    public function newTestBook(){

        return $this->state(function(array $attributes){
            return[
                'title' => 'Aprenda a meditar',
                'year' => 2999,
                'pages' => 234
            ];
        });
    }
}
