<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
	/**
	 * Run the migrations.
	 */
	public function up(): void
	{
		Schema::create('songs', function (Blueprint $table) {
			$table->id();
			$table->foreignId('event_session_id')->constrained('event_sessions');
			$table->string('title');
			$table->text('content')->nullable();
			$table->unsignedSmallInteger('sort_order')->default(10);
			$table->timestamps();
		});
	}

	/**
	 * Reverse the migrations.
	 */
	public function down(): void
	{
		Schema::dropIfExists('songs');
	}
};
