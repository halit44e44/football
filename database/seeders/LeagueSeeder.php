<?php

namespace Database\Seeders;

use App\Models\Leagues;
use Illuminate\Database\Seeder;

class LeagueSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Leagues::factory(1)->create();
    }
}
