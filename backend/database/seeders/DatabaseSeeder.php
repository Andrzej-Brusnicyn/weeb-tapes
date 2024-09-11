<?php

namespace Database\Seeders;

use App\Models\User;
use App\Models\Tape;
// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */

    public function run(): void
    {
        $this->call([
            TapesSeeder::class,
        ]);
    }
}




//    public function run(): void
//    {
//		Tape::factory()->count(50)->create();
//    }

