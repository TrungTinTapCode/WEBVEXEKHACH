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
        Schema::create('seats', function (Blueprint $table) {
            $table->id('seat_id');
            $table->foreignId('bus_id')->constrained('buses', 'bus_id');
            $table->string('seat_number', 10);
            $table->enum('seat_type', ['normal', 'vip', 'window', 'aisle'])->default('normal');
            $table->boolean('is_available')->default(true);
            $table->timestamps();
            
            $table->unique(['bus_id', 'seat_number']);
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('seats');
    }
};
