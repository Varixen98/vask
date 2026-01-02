<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Totebag;
use App\Models\Color;

class TotebagSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        //
        Totebag::factory()->count(20)->has(Color::factory()->count(3))->create();
    }
}
