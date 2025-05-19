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
        Schema::create('preowned', function (Blueprint $table) {
            $table->id();
            $table->string('name')->nullable();
            $table->integer('mileage')->nullable();
            $table->text('story')->nullable();
            $table->string('color')->nullable();
            $table->string('interior_color')->nullable();
            $table->enum('condition', ['excellent', 'very good', 'good', 'fair', 'poor'])->default('excellent');
            $table->text('features')->nullable();
            $table->dateTime('purchase_date')->nullable();
            $table->unsignedBigInteger('price')->nullable();
            $table->string('image')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('preowned');
    }
};
