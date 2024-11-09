<?php

namespace Database\Seeders;

use App\Models\UniversityType;
use Illuminate\Database\Seeder;

class UniversityTypeSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        UniversityType::factory()->count(5)->create();
    }
}
