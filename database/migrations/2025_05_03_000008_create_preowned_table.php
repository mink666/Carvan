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
            $table->unsignedBigInteger('inventory_id');
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
            $table->foreign('inventory_id')->references('id')->on('inventory')->onDelete('cascade');
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
