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
        $eventType = EventType::factory()->create(['name' => 'Sunday Service']);

        for ($i = 1; $i <= 3; $i++) {
            $event = Event::factory()->create([
                'event_type_id' => $eventType->id,
                'name' => $eventType->name.' '.$i,
            ]);

            EventSession::factory(3)->create(['event_id' => $event->id]);
        }

        $eventType = EventType::factory()->create(['name' => 'Sunday School']);

        for ($i = 1; $i <= 3; $i++) {
            $event = Event::factory()->create([
                'event_type_id' => $eventType->id,
                'name' => $eventType->name.' '.$i,
            ]);

            EventSession::factory(3)->create(['event_id' => $event->id]);
        }

        $eventType = EventType::factory()->create(['name' => 'Prayer Meeting']);

        for ($i = 1; $i <= 3; $i++) {
            $event = Event::factory()->create([
                'event_type_id' => $eventType->id,
                'name' => $eventType->name.' '.$i,
            ]);

            EventSession::factory(3)->create(['event_id' => $event->id]);
        }

        $eventType = EventType::factory()->create(['name' => 'Youth Fellowship']);

        for ($i = 1; $i <= 3; $i++) {
            $event = Event::factory()->create([
                'event_type_id' => $eventType->id,
                'name' => $eventType->name.' '.$i,
            ]);

            EventSession::factory(3)->create(['event_id' => $event->id]);
        }
    }
}
