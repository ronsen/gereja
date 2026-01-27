<?php

namespace Database\Seeders;

use App\Enums\Frequency;
use App\Models\Service;
use Illuminate\Database\Seeder;

class ServiceSeeder extends Seeder
{
	/**
	 * Run the database seeds.
	 */
	public function run(): void
	{
		Service::factory()->create([
			'name' => 'Sunday Service',
			'frequency' => Frequency::WEEKLY,
			'day_of_week' => 0,
			'starts_at' => '10:00',
			'ends_at' => '12:00',
		]);

		Service::factory()->create([
			'name' => 'Sunday School',
			'frequency' => Frequency::WEEKLY,
			'day_of_week' => 0,
			'starts_at' => '08:00',
			'ends_at' => '09:30',
		]);

		Service::factory()->create([
			'name' => 'Christmas',
			'frequency' => Frequency::YEARLY,
			'day_of_year' => 25,
			'month_of_year' => 12,
			'starts_at' => '09:00',
			'ends_at' => '12:00',
		]);
	}
}
