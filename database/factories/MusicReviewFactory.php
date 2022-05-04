<?php

namespace Database\Factories;

use App\Models\MusicInstrument;
use Illuminate\Database\Eloquent\Factories\Factory;

class MusicReviewFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        $message = $this->faker->realText(rand(100,254));
        $user_name = $this->faker->name;
        return [
            'message' => $message,
            'user_name' => $user_name,
            'instrument_id' => $this->faker->numberBetween(1, MusicInstrument::count()),
        ];
    }
}
