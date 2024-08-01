<?php

namespace Database\Factories;

use App\Enums\FamilyMemberType;
use App\Models\Congregation;
use App\Models\Family;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\FamilyMember>
 */
class FamilyMemberFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'family_id' => Family::inRandomOrder()->first()->id,
			'congregation_id' => Congregation::inRandomOrder()->first()->id,
			'type' => fake()->randomElement([
				FamilyMemberType::CHILD,
				FamilyMemberType::OTHER_RELATIVE,
				FamilyMemberType::NON_RELATIVE,
			]),
        ];
    }
}
