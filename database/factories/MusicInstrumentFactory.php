<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

class MusicInstrumentFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        $name = $this->faker->sentence(rand(3,8), true);
        $description = $this->faker->realText(rand(100,500));

        return [
            'image'=>'https://source.unsplash.com/random',
            'name' => $name,
            'description' => $description,
            'price' => rand(2000, 10000),

        ];
    }
}
