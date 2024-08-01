<?php

namespace Database\Factories;

use App\Models\Congregation;
use App\Models\Group;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\GroupMember>
 */
class GroupMemberFactory extends Factory
{
	/**
	 * Define the model's default state.
	 *
	 * @return array<string, mixed>
	 */
	public function definition(): array
	{
		return [
			'group_id' => Group::inRandomOrder()->first()->id,
			'congregation_id' => Congregation::inRandomOrder()->first()->id,
		];
	}
}
