<?php

namespace Database\Factories;

use App\Models\Event;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\EventSession>
 */
class EventSessionFactory extends Factory
{
	/**
	 * Define the model's default state.
	 *
	 * @return array<string, mixed>
	 */
	public function definition(): array
	{
		return [
			'event_id' => Event::inRandomOrder()->first()->id,
			'session_date' => fake()->dateTimeBetween('1 week', '2 weeks'),
			'start_time' => '08:00',
			'end_time' => '10:00',
		];
	}
}
