<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

class LeaguesFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'name' => $this->faker->name . ' League',
            'season' => $this->faker->dateTimeBetween('-7 days', '+2 month')->format('Y')
        ];
    }
}
