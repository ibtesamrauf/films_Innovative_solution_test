<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

class FilmFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'name' => $this->faker->name,
            'description' => $this->faker->sentence(6),
            'release_date' => \Carbon\Carbon::now()->addDays(5),
            'rating' => $this->faker->numberBetween(1, 5),
            'ticket_price' => $this->faker->randomFloat(3, 0, 1000),
            'country' => $this->faker->state,
            'genre' => $this->faker->name,
            'photo' => $this->faker->name,
            'slug' => $this->faker->name,
        ];
    }
}
