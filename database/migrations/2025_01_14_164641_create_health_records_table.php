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
        Schema::create('health_records', function (Blueprint $table) {
            $table->id();
            $table->foreignId('user_id')->constrained()->onDelete('cascade'); // User reference
            $table->foreignId('pet_id')->constrained()->onDelete('cascade');  // Pet reference
            $table->enum('record_type', ['vaccination', 'medication', 'checkup']); // Record type
            $table->text('description')->nullable(); // Optional description
            $table->date('date'); // Record date
            $table->string('document')->nullable(); // Optional document file
            $table->string('photo')->nullable();    // Optional photo file
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('health_records');
    }
};
