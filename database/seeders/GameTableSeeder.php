<?php

namespace Database\Seeders;

use App\Models\Game;
use Illuminate\Database\Seeder;

class GameTableSeeder extends Seeder
{
    public function run()
    {
        Game::factory()->count(100)->create();
    }
}
