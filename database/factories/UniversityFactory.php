<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Str;
use App\Models\District;
use App\Models\University;
use App\Models\UniversityFundType;
use App\Models\UniversityType;

class UniversityFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = University::class;

    /**
     * Define the model's default state.
     */
    public function definition(): array
    {
        return [
            'title' => $this->faker->sentence(4),
            'university_fund_type_id' => UniversityFundType::factory(),
            'university_type_id' => UniversityType::factory(),
            'district_id' => District::factory(),
            'description' => $this->faker->text(),
            'phone' => $this->faker->phoneNumber(),
            'contact' => $this->faker->text(),
            'short_links' => $this->faker->text(),
            'gmap_link' => $this->faker->text(),
            'web_link' => $this->faker->text(),
            'email' => $this->faker->safeEmail(),
            'email_register' => $this->faker->regexify('[A-Za-z0-9]{400}'),
            'status' => $this->faker->randomElement(["active","disabled"]),
        ];
    }
}
