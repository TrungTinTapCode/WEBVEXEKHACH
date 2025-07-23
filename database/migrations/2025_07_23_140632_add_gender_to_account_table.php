<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up()
    {
        Schema::table('account', function (Blueprint $table) {
            $table->string('gender', 10)->nullable()->after('phone_number');
        });
    }

    public function down()
    {
        Schema::table('account', function (Blueprint $table) {
            $table->dropColumn('gender');
        });
    }
};
