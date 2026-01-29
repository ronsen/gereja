<?php

namespace Database\Factories;

use App\Enums\Gender;
use App\Models\Church;
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
			'church_id' => Church::inRandomOrder()->first()->id,
			'name' => fake()->name(),
			'gender' => fake()->randomElement([Gender::MALE, Gender::FEMALE]),
			'date_of_birth' => fake()->dateTimeBetween('-30 years', '-20 years'),
			'street_address' => fake()->streetAddress(),
			'city' => 'Jakarta',
			'province' => 'DKI Jakarta',
			'postal_code' => fake()->postcode(),
			'phone_number' => fake()->phoneNumber(),
			'email' => fake()->safeEmail(),
			'joined_at' => fake()->dateTimeBetween('-12 years', '-10 years'),
			'baptized_at' => fake()->dateTimeBetween('-8 years', '-6 years'),
			'confirmed_at' => fake()->dateTimeBetween('-5 years', '-2 years'),
		];
	}
}
