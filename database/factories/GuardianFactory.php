<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Guardian>
 */
class GuardianFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'father_name' => $this->faker->name,
            'father_phone' => $this->faker->phoneNumber,
            'father_email' => $this->faker->unique()->safeEmail,
            'father_civil_id' => $this->faker->unique()->randomNumber(8),
            'father_address' => $this->faker->address,
            'father_job' => $this->faker->jobTitle,
            'mother_name' => $this->faker->name,
            'mother_phone' => $this->faker->phoneNumber,
            'mother_email' => $this->faker->unique()->safeEmail,
            'mother_civil_id' => $this->faker->unique()->randomNumber(8),
            'mother_address' => $this->faker->address,
            'mother_job' => $this->faker->jobTitle,
        ];
    }
}