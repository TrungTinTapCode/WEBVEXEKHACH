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
        // Cập nhật ENUM payment_method
        DB::statement("ALTER TABLE payments MODIFY COLUMN payment_method ENUM(
            'VIETCOMBANK', 'AGRIBANK', 'VIETTINBANK', 'BIDV', 'VISA', 'MASTERCARD'
        ) NOT NULL");
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('payments', function (Blueprint $table) {
            //
        });
    }
};
