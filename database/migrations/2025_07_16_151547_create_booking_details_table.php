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
        Schema::create('booking_details', function (Blueprint $table) {
            $table->id('booking_detail_id');
            $table->foreignId('booking_id')->constrained('bookings', 'booking_id');
            $table->foreignId('seat_id')->constrained('seats', 'seat_id');
            $table->string('passenger_name', 100);
            $table->string('passenger_phone', 20)->nullable();
            $table->decimal('price', 12, 2);
            $table->string('ticket_number', 20)->unique();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('booking_details');
    }
};
