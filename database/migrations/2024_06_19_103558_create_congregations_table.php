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
		Schema::create('congregations', function (Blueprint $table) {
			$table->id();
			$table->string('name');
			$table->enum('gender', ['MALE', 'FEMALE']);
			$table->date('date_of_birth');
			$table->string('address')->nullable();
			$table->string('city')->nullable();
			$table->string('province')->nullable();
			$table->string('country')->nullable();
			$table->string('phone_number')->nullable();
			$table->string('email')->nullable();
			$table->softDeletes();
			$table->timestamps();
		});
	}

	/**
	 * Reverse the migrations.
	 */
	public function down(): void
	{
		Schema::dropIfExists('congregations');
	}
};
