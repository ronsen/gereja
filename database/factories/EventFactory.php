<?php

namespace Database\Factories;

use App\Models\EventType;
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
		$eventType = EventType::inRandomOrder()->first();

        return [
			'event_type_id' => $eventType->id,
			'name' => $eventType->name . ' ' . fake()->numberBetween(100, 200),
			'description' => fake()->sentence(),
			'start_at' => now(),
			'end_at' => now()->addHours(2),
        ];
    }
}
