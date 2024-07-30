<?php

use App\Models\Congregation;
use App\Models\Family;
use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('family_members', function (Blueprint $table) {
            $table->id();
			$table->foreignIdFor(Family::class)->constrained();
			$table->foreignIdFor(Congregation::class)->constrained();
			$table->enum('type', [
				'HEAD_OF_HOUSEHOLD',
				'SPOUSE',
				'CHILD',
				'OTHER_RELATIVE',
				'NON_RELATIVE',
			]);
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('family_members');
    }
};
