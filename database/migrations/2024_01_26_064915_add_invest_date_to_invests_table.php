<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up()
    {
        Schema::table('invests', function (Blueprint $table) {
            $table->timestamp('invest_date')->nullable()->after('amount');
            // Add any other modifications you need
        });
    }

    public function down()
    {
        Schema::table('invests', function (Blueprint $table) {
            $table->dropColumn('invest_date');
        });
    }
};
