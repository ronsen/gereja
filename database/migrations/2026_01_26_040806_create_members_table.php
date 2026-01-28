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
        Schema::create('members', function (Blueprint $table) {
            $table->id();
			$table->foreignId('church_id')->constrained('churches');
			$table->string('name');
			$table->enum('gender', ['MALE', 'FEMALE'])->default('FEMALE');
			$table->date('date_of_birth')->nullable();
			$table->string('street_address')->nullable();
            $table->string('city')->nullable();
            $table->string('province')->nullable();
            $table->string('postal_code')->nullable();
            $table->string('phone_number')->nullable();
            $table->string('email')->nullable();
			$table->date('joined_at')->nullable();
			$table->date('baptized_at')->nullable();
			$table->date('confirmed_at')->nullable();
			$table->boolean('active')->default(true);
			$table->softDeletes();
			$table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('members');
    }
};
