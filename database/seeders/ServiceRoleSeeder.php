<?php

namespace Database\Seeders;

use App\Models\ServiceRole;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class ServiceRoleSeeder extends Seeder
{
	/**
	 * Run the database seeds.
	 */
	public function run(): void
	{
		ServiceRole::factory()->create(['name' => 'Preacher']);
		ServiceRole::factory()->create(['name' => 'Worship Leader']);
		ServiceRole::factory()->create(['name' => 'Singer']);
		ServiceRole::factory()->create(['name' => 'Keyboardist']);
		ServiceRole::factory()->create(['name' => 'Guitarist']);
		ServiceRole::factory()->create(['name' => 'Drummer']);
		ServiceRole::factory()->create(['name' => 'Usher']);
		ServiceRole::factory()->create(['name' => 'Multimedia']);
	}
}
