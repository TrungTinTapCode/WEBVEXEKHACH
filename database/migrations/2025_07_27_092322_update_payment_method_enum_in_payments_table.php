<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;
use Illuminate\Support\Facades\DB;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        // First, drop the existing payment_method column
        Schema::table('payments', function (Blueprint $table) {
            $table->dropColumn('payment_method');
        });

        // Then add it back with the new enum values
        Schema::table('payments', function (Blueprint $table) {
            $table->enum('payment_method', [
                'VIETCOMBANK', 
                'AGRIBANK', 
                'VIETTINBANK', 
                'BIDV', 
                'VISA', 
                'MASTERCARD'
            ])->after('amount');
        });

        // Set default value for existing records if needed
        DB::statement("UPDATE payments SET payment_method = 'VIETCOMBANK' WHERE payment_method IS NULL");
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        // For rollback, first drop the new column
        Schema::table('payments', function (Blueprint $table) {
            $table->dropColumn('payment_method');
        });

        // Then recreate with original enum values
        Schema::table('payments', function (Blueprint $table) {
            $table->enum('payment_method', [
                'cash',
                'credit_card',
                'bank_transfer',
                'ewallet'
            ])->after('amount');
        });

        // You might need to set default values when rolling back
        DB::statement("UPDATE payments SET payment_method = 'cash' WHERE payment_method IS NULL");
    }
};