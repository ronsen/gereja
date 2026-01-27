<?php

namespace Database\Seeders;

use App\Models\Member;
use App\Models\MemberType;
use Illuminate\Database\Seeder;

class MemberSeeder extends Seeder
{
	/**
	 * Run the database seeds.
	 */
	public function run(): void
	{
		Member::factory()->create([
			'member_type_id' => MemberType::factory()->create(['name' => 'Gembala']),
		]);

		Member::factory()->create([
			'member_type_id' => MemberType::factory()->create(['name' => 'Pendeta']),
		]);

		$memberType = MemberType::factory()->create(['name' => 'Penatua']);

		Member::factory(5)->create([
			'member_type_id' => $memberType->id,
		]);

		$memberType = MemberType::factory()->create(['name' => 'Jemaat']);

		Member::factory(10)->create([
			'member_type_id' => $memberType->id,
		]);
	}
}
