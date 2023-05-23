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
            $table->string('user_tag')->unique();
            $table->string('username')->unique();
            $table->string('password');
            $table->string('first_name');
            $table->string('last_name');
            $table->text('bio')->nullable()->default(null);
            $table->date('date_of_birth');
            $table->string('email')->unique();
            $table->boolean('gender');
            $table->string('phone_number')->nullable()->default(null);
            $table->string('avatar')->nullable()->default(null);
            $table->string('payment_method')->nullable()->default(null);
            $table->string('remember_token')->nullable()->default(null);
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
