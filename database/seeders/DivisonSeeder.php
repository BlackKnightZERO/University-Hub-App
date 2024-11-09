<?php

namespace Database\Seeders;

use App\Models\Divison;
use Illuminate\Database\Seeder;

class DivisonSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Divison::factory()->count(5)->create();
    }
}
