<?php

namespace Database\Factories;

use App\Enums\TalkType;
use App\Models\Talk;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends Factory<Talk>
 */
class TalkFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'user_id' => \App\Models\User::factory(),
            'title' => $this->faker->sentence(),
            'type' => $this->faker->randomElement(TalkType::cases())->value,
            'length' => rand(15, 60),
            'abstract' => $this->faker->paragraph(),
            'organizer_notes' => $this->faker->paragraph(),
        ];
    }
}
