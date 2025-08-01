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
    Schema::table('seats', function (Blueprint $table) {
        $table->boolean('is_booked')->default(false)->after('is_available');
    });
}

public function down(): void
{
    Schema::table('seats', function (Blueprint $table) {
        $table->dropColumn('is_booked');
    });
}

};
