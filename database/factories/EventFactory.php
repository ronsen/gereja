<?php

namespace Database\Factories;

use App\Models\Church;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Event>
 */
class EventFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
		$start = fake()->dateTimeBetween('08:00', '18:00');

        return [
            'church_id' => Church::inRandomOrder()->first()->id,
			'name' => 'Event ' . fake()->numberBetween(1, 100),
			'description' => fake()->paragraphs(3, true),
			'event_date' => now()->addMonth(),
			'starts_at' => $start->format('H:i'),
			'ends_at' => (clone $start)->modify('+1 hour')->format('H:i'),
			'active' => true,
        ];
    }
}
