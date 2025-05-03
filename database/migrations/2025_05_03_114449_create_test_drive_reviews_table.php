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
        Schema::create('test_drive_reviews', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('test_drive_request_id')->unique();
            $table->text('review')->nullable();
            $table->timestamps();
            $table->foreign('test_drive_request_id')->references('id')->on('test_drive_requests')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('test_drive_reviews');
    }
};
