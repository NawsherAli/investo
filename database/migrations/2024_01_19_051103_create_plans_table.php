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
        Schema::create('plans', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->decimal('maximum', 10, 2)->nullable();
            $table->decimal('manimum', 10, 2)->nullable();
            $table->string('times');
            $table->enum('capital_back', ['yes','no']);
            $table->string('valid_for');
            $table->string('level_1');
            $table->string('level_2');
            $table->string('level_3');
            $table->string('per_day_earn');
            $table->enum('status', ['active', 'in-active'])->default('active');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('plans');
    }
};
