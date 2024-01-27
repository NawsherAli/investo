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
        Schema::create('users', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->string('email')->unique();
            $table->string('contact')->nullable();
            $table->timestamp('email_verified_at')->nullable();
            $table->string('password');
            $table->enum('status', ['active', 'in-active'])->default('active');
            $table->enum('role', ['admin','customer']);
            $table->enum('is_online', ['true', 'false']);
            $table->string('profile_image')->default('no-profile.png');
            $table->string('referal_code')->unique()->default(Str::random(8));
            $table->string('refer_by')->nullable();
            $table->string('level_1');
            $table->string('level_2');
            $table->string('level_3');
            $table->decimal('total_balance', 10, 2)->nullable();
            $table->decimal('current_balance', 10, 2)->nullable();
            $table->rememberToken();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('users');
    }
};
