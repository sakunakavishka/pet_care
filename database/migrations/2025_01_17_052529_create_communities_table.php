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
        Schema::create('communities', function (Blueprint $table) {
            $table->id();
            $table->foreignId('user_id')->constrained('users')->onDelete('cascade'); // Foreign Key to Users
            $table->enum('post_type', ['question', 'photo', 'event']); // Type of post
            $table->text('content')->nullable(); // Content of the post
            $table->json('photos')->nullable(); // JSON field to store multiple photo paths
            $table->string('question')->nullable(); // Specific question for "question" type posts
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('communities');
    }
};
