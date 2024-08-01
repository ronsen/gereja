<?php

namespace Database\Seeders;

use App\Models\GroupType;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class GroupTypeSeeder extends Seeder
{
	/**
	 * Run the database seeds.
	 */
	public function run(): void
	{
		GroupType::create([
			'name' => 'Ministry',
		]);

		GroupType::create([
			'name' => 'Team',
		]);

		GroupType::create([
			'name' => 'Bible Study',
		]);

		GroupType::create([
			'name' => 'Sunday School Class',
		]);
	}
}
