<?php

namespace Database\Seeders;

use App\Models\Event;
use App\Models\EventType;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
	use WithoutModelEvents;

	/**
	 * Seed the application's database.
	 */
	public function run(): void
	{
		$this->call(UserSeeder::class);

		$this->call(ChurchSeeder::class);
		$this->call(MemberSeeder::class);
		$this->call(RoleSeeder::class);

		$this->call(EventType::class);
		$this->call(Event::class);
	}
}
