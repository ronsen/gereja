<?php

namespace Database\Seeders;

use App\Models\EventSession;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class EventSessionSeeder extends Seeder
{
	/**
	 * Run the database seeds.
	 */
	public function run(): void
	{
		EventSession::factory(10)->create();
	}
}
