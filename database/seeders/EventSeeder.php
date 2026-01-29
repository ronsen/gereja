<?php

namespace Database\Seeders;

use App\Models\Event;
use App\Models\EventSession;
use App\Models\EventType;
use Illuminate\Database\Seeder;

class EventSeeder extends Seeder
{
	/**
	 * Run the database seeds.
	 */
	public function run(): void
	{
		$eventType = EventType::factory()->create(['name' => 'Ibadah Minggu']);

		$event = Event::factory()->create([
			'event_type_id' => $eventType->id,
			'name' => $eventType->name . ' 1',
		]);

		EventSession::factory(3)->create(['event_id' => $event->id]);

		$eventType = EventType::factory()->create(['name' => 'Sekolah Minggu']);

		$event = Event::factory()->create([
			'event_type_id' => $eventType->id,
			'name' => $eventType->name . ' 1',
		]);

		EventSession::factory(2)->create(['event_id' => $event->id]);

		EventType::factory()->create(['name' => 'Perseketuan Doa']);
		EventType::factory()->create(['name' => 'Persekutuan Pemuda']);
	}
}
