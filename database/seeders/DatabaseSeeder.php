<?php

namespace Database\Seeders;

use App\Models\MusicInstrument;
use App\Models\MusicReview;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        $this->call(MusicInstrumentTableSeeder::class);
        $this->call(MusicReviewTableSeeder::class);


    }
}
