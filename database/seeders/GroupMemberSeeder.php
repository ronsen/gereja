<?php

namespace Database\Seeders;

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
		GroupMember::factory(20)->create();
	}
}
