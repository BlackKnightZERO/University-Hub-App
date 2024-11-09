<?php

namespace Database\Seeders;

use App\Models\UniversityProgram;
use Illuminate\Database\Seeder;

class UniversityProgramSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        UniversityProgram::factory()->count(5)->create();
    }
}
