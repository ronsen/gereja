<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Member>
 */
class MemberFactory extends Factory
{
	/**
	 * Define the model's default state.
	 *
	 * @return array<string, mixed>
	 */
	public function definition(): array
	{
		return [
			'name' => fake()->name(),
			'date_of_birth' => fake()->dateTimeBetween('-40 years', '-20 years'),
			'gender' => fake()->boolean() ? 'MALE' : 'FEMALE',
			'address' => fake()->address(),
			'city' => fake()->city(),
			'province' => fake()->state(),
			'country' => 'Indonesia',
			'phone_number' => fake()->phoneNumber(),
			'email' => fake()->safeEmail(),
		];
	}
}
