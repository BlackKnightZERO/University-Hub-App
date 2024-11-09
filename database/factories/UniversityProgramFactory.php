<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Str;
use App\Models\University;
use App\Models\UniversityProgram;
use App\Models\UniversityProgramType;

class UniversityProgramFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = UniversityProgram::class;

    /**
     * Define the model's default state.
     */
    public function definition(): array
    {
        return [
            'title' => $this->faker->sentence(4),
            'university_program_type_id' => UniversityProgramType::factory(),
            'description' => $this->faker->text(),
            'total_credit' => $this->faker->numberBetween(-10000, 10000),
            'total_year' => $this->faker->numberBetween(-10000, 10000),
            'exam_system' => $this->faker->text(),
            'exam_requirement' => $this->faker->text(),
            'admission_cost' => $this->faker->text(),
            'total_cost' => $this->faker->text(),
            'admission_link' => $this->faker->text(),
            'online_form_link' => $this->faker->text(),
            'web_link' => $this->faker->text(),
            'status' => $this->faker->randomElement(["active","disabled"]),
            'university_id' => University::factory(),
        ];
    }
}
