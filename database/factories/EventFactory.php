<?php

namespace Database\Factories;

use App\Models\Category;
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
			'category_id' => Category::inRandomOrder()->first()->id,
			'name' => ucwords(fake()->words(3, true)),
			'description' => fake()->sentence(),
			'event_date' => fake()->dateTimeBetween('now', '+30 days'),
			'address' => fake()->streetAddress(),
		];
	}
}
