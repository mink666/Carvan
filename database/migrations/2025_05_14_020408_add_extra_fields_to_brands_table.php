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
        Schema::table('brands', function (Blueprint $table) {
            $table->string('company_full_name')->nullable()->after('name');
            $table->string('motto')->nullable()->after('logo');
            $table->string('website_url')->nullable()->after('motto');
            $table->string('cover_image')->nullable()->after('website_url');
            $table->json('key_achievements')->nullable()->after('cover_image');
            $table->string('founder')->nullable()->after('year');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('brands', function (Blueprint $table) {
            $table->dropColumn([
            'company_full_name',
            'motto',
            'website_url',
            'cover_image',
            'key_achievements',
            'founder'
            ]);
        });
    }
};
