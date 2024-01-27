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
        Schema::create('withdraw_infos', function (Blueprint $table) {
            $table->id();
            $table->decimal('minimum_withdraw', 10, 2)->nullable();
            $table->string('commission');
            $table->enum('status', ['active', 'in-active'])->default('in-active');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('withdraw_infos');
    }
};
