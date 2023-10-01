<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Schedule>
 */
class ScheduleFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'student_id' => fake()->randomDigit()+1,
            'subject_id' => fake()->randomDigit()+1,
            'schedule_date' => fake()->dateTime(),
            'schedule_type' => fake()->optional(0.5, 'online')->randomElement(['online', 'offline']),
        ];
    }
}
