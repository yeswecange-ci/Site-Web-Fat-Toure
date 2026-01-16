<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('site_settings', function (Blueprint $table) {
            $table->id();
            $table->json('site_name'); // translatable
            $table->json('site_title'); // translatable
            $table->json('site_description')->nullable(); // translatable
            $table->json('hero_title')->nullable(); // translatable
            $table->json('hero_subtitle')->nullable(); // translatable
            $table->string('hero_image')->nullable();
            $table->string('meta_image')->nullable();
            $table->timestamps();
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('site_settings');
    }
};
