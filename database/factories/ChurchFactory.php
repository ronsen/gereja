<?php

namespace Database\Factories;

use App\Models\User;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Church>
 */
class ChurchFactory extends Factory
{
	/**
	 * Define the model's default state.
	 *
	 * @return array<string, mixed>
	 */
	public function definition(): array
	{
		return [
			'user_id' => User::inRandomOrder()->first()->id,
			'name' => 'Church ' . fake()->randomNumber(1, 100),
			'street_address' => fake()->streetAddress(),
			'city' => 'Jakarta',
			'province' => 'DKI Jakarta',
			'postal_code' => fake()->postcode(),
			'email' => fake()->safeEmail(),
		];
	}
}
