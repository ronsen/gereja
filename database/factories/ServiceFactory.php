<?php

namespace Database\Factories;

use App\Enums\Frequency;
use App\Models\Church;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Service>
 */
class ServiceFactory extends Factory
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
			'name' => 'Service ' . fake()->numberBetween(1, 100),
			'frequency' => fake()->randomElement([
				Frequency::WEEKLY,
				Frequency::WEEKLY,
				Frequency::YEARLY,
			]),
			'starts_at' => $start->format('H:i'),
			'ends_at' => (clone $start)->modify('+1 hour')->format('H:i'),
		];
	}
}
