<?php

namespace Database\Factories;

use App\Enums\Gender;
use App\Models\Church;
use App\Models\MemberType;
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
			'member_type_id' => MemberType::inRandomOrder()->first()->id,
			'name' => fake()->name(),
			'gender' => fake()->randomElement([Gender::MALE, Gender::FEMALE]),
			'place_of_birth' => fake()->city(),
			'date_of_birth' => fake()->dateTimeBetween('-30 years', '-20 years'),
			'street_address' => fake()->streetAddress(),
			'city' => 'Jakarta',
			'province' => 'DKI Jakarta',
			'postal_code' => fake()->postcode(),
			'email' => fake()->safeEmail(),
			'active' => true,
		];
	}
}
