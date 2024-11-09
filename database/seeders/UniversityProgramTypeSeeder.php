<?php

namespace Database\Seeders;

use App\Models\UniversityProgramType;
use Illuminate\Database\Seeder;

class UniversityProgramTypeSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        UniversityProgramType::factory()->count(5)->create();
    }
}
