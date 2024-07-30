<?php

namespace Database\Seeders;

use App\Enums\EventTypePattern;
use App\Models\EventType;
use Carbon\Carbon;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class EventTypeSeeder extends Seeder
{
	/**
	 * Run the database seeds.
	 */
	public function run(): void
	{
		EventType::create([
			'name' => 'Church Service',
			'pattern' => EventTypePattern::WEEKLY,
		]);

		EventType::create([
			'name' => 'Sunday School',
			'pattern' => EventTypePattern::WEEKLY,
		]);

		EventType::create([
			'name' => 'Christmas',
			'pattern' => EventTypePattern::YEARLY,
		]);
	}
}
