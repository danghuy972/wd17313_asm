<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Cours>
 */
class CoursFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition()
    {
        return [
            'name' => fake()->name(),
            'price' => fake()->randomNumber(),
            'description' => 'Đây là mô tả',
            'image' => 'adasdasdsdsadasdasdas',
            'category_id' => 1,
            'instructor_id' => 2
        ];
    }
}
