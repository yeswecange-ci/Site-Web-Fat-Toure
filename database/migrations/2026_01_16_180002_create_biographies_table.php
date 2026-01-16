<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('biographies', function (Blueprint $table) {
            $table->id();
            $table->json('section_title'); // translatable - "Biographie"
            $table->json('block1_title'); // translatable
            $table->json('block1_content'); // translatable
            $table->string('block1_image')->nullable();
            $table->json('block2_title')->nullable(); // translatable
            $table->json('block2_content')->nullable(); // translatable
            $table->string('block2_image1')->nullable();
            $table->string('block2_image2')->nullable();
            $table->boolean('is_active')->default(true);
            $table->timestamps();
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('biographies');
    }
};
