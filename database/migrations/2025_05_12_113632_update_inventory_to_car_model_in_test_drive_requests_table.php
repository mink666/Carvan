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
        Schema::table('test_drive_requests', function (Blueprint $table) {
            $table->dropForeign(['inventory_id']);
            $table->dropColumn('inventory_id');
            $table->unsignedBigInteger('car_model_id')->nullable()->after('user_id');
            $table->foreign('car_model_id')->references('id')->on('car_models')->onDelete('set null');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('test_drive_requests', function (Blueprint $table) {
            $table->dropForeign(['car_model_id']);
            $table->dropColumn('car_model_id');
            $table->unsignedBigInteger('inventory_id')->nullable()->after('user_id');
            $table->foreign('inventory_id')->references('id')->on('inventories')->onDelete('set null');
        });
    }
};
