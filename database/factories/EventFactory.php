<?php

namespace Database\Factories;

use App\Models\Church;
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
		return [
			'church_id' => Church::inRandomOrder()->first()->id,
			'event_type_id' => EventType::inRandomOrder()->first()->id,
			'name' => 'Event ' . fake()->numberBetween(1, 100),
			'description' => fake()->paragraphs(5, true),
			'location' => fake()->address(),
		];
	}
}
