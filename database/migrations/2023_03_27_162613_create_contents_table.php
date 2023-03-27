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
        Schema::create('contents', function (Blueprint $table) {
            $table->id();
            $table->string('content_id')->primary();
            $table->string('media');
            $table->string('caption')->nullable();
            $table->string('prompt')->nullable();
            $table->string('collection_id')->nullable();
            $table->string('content_owner_id');
            $table->integer('like_count')->default(0);
            $table->smallInteger('permission')->default(0);
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('contents');
    }
};
