<?php

namespace Database\Factories;

use App\Models\Grade;
use App\Models\Student;
use App\Models\Guardian;
use App\Models\Classroom;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Student>
 */
class StudentFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'name' => $this->faker->name, // Generate a random student name
            'guardian_id' => Guardian::factory(), // Link to a guardian
            'grade_id' => Grade::factory(),
            'classroom_id' => Classroom::factory(), // Link to a classroom
            'date_of_birth' => $this->faker->date(), // Generate a random date of birth
            'civil_id' => $this->faker->unique()->numerify('##########'), // Generate a unique civil ID
        ];
    }
}