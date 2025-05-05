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
        Schema::create('inventory', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('car_model_id');
            $table->string('color')->nullable();
            $table->string('interior_color')->nullable();
            $table->unsignedBigInteger('price')->nullable();
            $table->text('features')->nullable();
            $table->integer('quantity')->default(1);
            // Đánh dấu xe có được hiển thị lên trang web hay không
            $table->boolean('is_active')->default(true);
             // Đánh dấu xe cũ (preowned) nếu cần tìm trong bảng preowned
            $table->boolean('is_preowned')->default(false);
            $table->enum('status', ['sale', 'test'])->default('sale');
            $table->timestamps();
            $table->foreign('car_model_id')->references('id')->on('car_models')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('inventory');
    }
};
