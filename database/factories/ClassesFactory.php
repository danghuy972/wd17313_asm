<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Classes>
 */
class ClassesFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition()
    {
        return [
            'name' =>fake()->name(),
            'start_date'=>fake()->date(),
            'end_date' =>fake()->date(),
            'location' =>fake()->address(),
            'course_id' =>1,
            'instructor_id' => 2
        ];
    }
}
