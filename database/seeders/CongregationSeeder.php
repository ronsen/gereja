<?php

namespace Database\Seeders;

use App\Models\Congregation;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class CongregationSeeder extends Seeder
{
	/**
	 * Run the database seeds.
	 */
	public function run(): void
	{
		Congregation::factory(20)->create();
	}
}
