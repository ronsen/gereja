<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
	/**
	 * Seed the application's database.
	 */
	public function run(): void
	{
		$this->call(UserSeeder::class);
		$this->call(CongregationSeeder::class);
		$this->call(FamilySeeder::class);
		$this->call(FamilyMemberSeeder::class);
		$this->call(EventTypeSeeder::class);
		$this->call(EventSeeder::class);
		$this->call(GroupTypeSeeder::class);
		$this->call(GroupSeeder::class);
		$this->call(GroupMemberSeeder::class);
	}
}
