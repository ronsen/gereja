<?php

namespace Database\Seeders;

use App\Models\Family;
use App\Models\FamilyMember;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class FamilyMemberSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $families = Family::all();

		foreach ($families as $family) {
			FamilyMember::factory(5)->create([
				'family_id' => $family->id,
			]);
		}
    }
}
