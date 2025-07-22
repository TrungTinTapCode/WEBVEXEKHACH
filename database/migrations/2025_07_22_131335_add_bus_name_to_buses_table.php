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
    Schema::table('buses', function (Blueprint $table) {
        $table->string('bus_name', 100)->after('bus_id');
    });
}

public function down(): void
{
    Schema::table('buses', function (Blueprint $table) {
        $table->dropColumn('bus_name');
    });
}

};
