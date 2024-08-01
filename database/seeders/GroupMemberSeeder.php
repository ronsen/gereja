<?php

namespace Database\Seeders;

use App\Models\Group;
use App\Models\GroupMember;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class GroupMemberSeeder extends Seeder
{
	/**
	 * Run the database seeds.
	 */
	public function run(): void
	{
		$groups = Group::all();

		foreach ($groups as $group) {
			GroupMember::factory(5)->create([
				'group_id' => $group->id,
			]);
		}
	}
}
