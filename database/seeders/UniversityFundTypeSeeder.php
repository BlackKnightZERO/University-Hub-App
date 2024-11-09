<?php

namespace Database\Seeders;

use App\Models\UniversityFundType;
use Illuminate\Database\Seeder;

class UniversityFundTypeSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        UniversityFundType::factory()->count(5)->create();
    }
}
