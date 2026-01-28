<?php

namespace Database\Seeders;

use App\Models\EventType;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class EventTypeSeeder extends Seeder
{
	/**
	 * Run the database seeds.
	 */
	public function run(): void
	{
		EventType::factory()->create(['name' => 'Sunday Service']);
		EventType::factory()->create(['name' => 'Sunday School']);
		EventType::factory()->create(['name' => 'Prayer Meeting']);
		EventType::factory()->create(['name' => 'Youth Fellowship']);
	}
}
