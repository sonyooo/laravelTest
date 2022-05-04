<?php

namespace Database\Seeders;

use App\Models\MusicInstrument;
use Illuminate\Database\Seeder;

class MusicInstrumentTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        MusicInstrument::factory(100)->create();
    }
}
