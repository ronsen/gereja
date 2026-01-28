<?php

namespace Database\Seeders;

use App\Models\Member;
use App\Models\Role;
use Illuminate\Database\Seeder;

class RoleSeeder extends Seeder
{
	/**
	 * Run the database seeds.
	 */
	public function run(): void
	{
		$role = Role::factory()->create(['name' => 'Senior Pastor']);
		$member = Member::inRandomOrder()->first();
		$member->roles()->attach($role->id, [
			'started_at' => now(),
		]);

		$role = Role::factory()->create(['name' => 'Pastor']);
		$member = Member::inRandomOrder()->first();
		$member->roles()->attach($role->id, [
			'started_at' => now(),
		]);

		$role = Role::factory()->create(['name' => 'Elder']);

		$members = Member::inRandomOrder()->limit(5)->get();
		foreach ($members as $member) {
			$member->roles()->attach($role->id, [
				'started_at' => now(),
			]);
		}
	}
}
