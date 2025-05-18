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
        Schema::table('schedules', function (Blueprint $table) {
            $table->unsignedBigInteger('supply_id')->nullable()->after('pet_id'); // Foreign key to supplies table
            $table->float('amount')->nullable()->after('supply_id'); // Amount in grams
            
            $table->foreign('supply_id')->references('id')->on('supplies')->onDelete('set null'); // Optional cascade
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('schedules', function (Blueprint $table) {
            $table->dropForeign(['supply_id']);
            $table->dropColumn(['supply_id', 'amount']);
        });
    }
};
