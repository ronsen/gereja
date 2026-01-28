<?php

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
        Schema::create('member_role', function (Blueprint $table) {
			$table->foreignId('member_id')->constrained('members');
			$table->foreignId('role_id')->constrained('roles');
			$table->date('started_at')->nullable();
			$table->date('ended_at')->nullable();
			$table->primary(['member_id', 'role_id']);
		});
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('member_role');
    }
};
