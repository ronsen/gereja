<?php

namespace Database\Seeders;

use App\Models\Event;
use App\Models\EventType;
use Illuminate\Database\Seeder;

class EventSeeder extends Seeder
{
	/**
	 * Run the database seeds.
	 */
	public function run(): void
	{
		foreach (EventType::all() as $eventType) {
			for ($i = 0; $i <= 3; $i++) {
				Event::factory()->create([
					'event_type_id' => $eventType->id,
					'name' => $eventType->name . ' ' . ++$i,
				]);
			}
		}
	}
}
