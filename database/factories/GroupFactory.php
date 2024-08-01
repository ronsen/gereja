<?php

namespace Database\Factories;

use App\Models\GroupType;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\GroupType>
 */
class GroupFactory extends Factory
{
	/**
	 * Define the model's default state.
	 *
	 * @return array<string, mixed>
	 */
	public function definition(): array
	{
		$groupType = GroupType::inRandomOrder()->first();

		return [
			'group_type_id' => $groupType->id,
			'name' => $groupType->name . ' ' . fake()->numberBetween(100, 200),
		];
	}
}
