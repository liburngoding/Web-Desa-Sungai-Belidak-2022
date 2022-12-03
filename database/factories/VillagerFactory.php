<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

class VillagerFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'name' => $this->faker->name(),
            'NIK' => $this->faker->nik(),
            'gender_id' => mt_rand(1, 2),
            'birthplace' => $this->faker->city(),
            'birthdate' => $this->faker->date(),
            'religion_id' => mt_rand(1, 7),
            'education_id' => mt_rand(1, 10),
            'profession_id' => mt_rand(1, 19),
            'bloodtype_id' => mt_rand(1, 13),
            'marital_id' => mt_rand(1, 4),
            'maritaldate' => null,
            'familyrelation_id' => mt_rand(1, 11),
            'father_name' => $this->faker-> name(),
            'mother_name' => $this->faker-> name(),
        ];
    }
}
