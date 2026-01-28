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
		Schema::create('event_session_assignments', function (Blueprint $table) {
			$table->foreignId('event_session_id')->constrained('event_sessions');
			$table->foreignId('member_id')->constrained('members');
			$table->foreignId('service_role_id')->constrained('service_roles');

			$table->unique([
				'event_session_id',
				'person_id',
				'service_role_id',
			]);
		});
	}

	/**
	 * Reverse the migrations.
	 */
	public function down(): void
	{
		Schema::dropIfExists('event_session_assignments');
	}
};
