<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Str;
use Faker\Generator;


class PostFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array
     */

    public function definition()
    {
        return [
            'title'=> $this->faker->name,
            'body'=> $this->faker->paragraph(),
            'user_id' =>$this->faker->randomDigitNotZero(),
        ];
    }
}
