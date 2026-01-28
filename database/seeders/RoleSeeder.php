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
		$role = Role::factory()->create(['name' => 'Gembala']);
		$member = Member::inRandomOrder()->first();
		$member->roles()->attach($role->id, [
			'started_at' => now(),
		]);

		$role = Role::factory()->create(['name' => 'Pendeta']);
		$member = Member::inRandomOrder()->first();
		$member->roles()->attach($role->id, [
			'started_at' => now(),
		]);

		$role = Role::factory()->create(['name' => 'Penatua']);

		$members = Member::inRandomOrder()->limit(5)->get();
		foreach ($members as $member) {
			$member->roles()->attach($role->id, [
				'started_at' => now(),
			]);
		}
	}
}
