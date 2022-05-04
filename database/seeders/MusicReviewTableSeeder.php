<?php

namespace Database\Seeders;

use App\Models\MusicReview;
use Illuminate\Database\Seeder;

class MusicReviewTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        MusicReview::factory(50)->create();
    }
}
