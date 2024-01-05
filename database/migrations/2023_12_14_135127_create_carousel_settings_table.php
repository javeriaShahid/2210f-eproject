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
        Schema::create('carousel_settings', function (Blueprint $table) {
            $table->id();
            $table->longText('image');
            $table->string("tag_1");
            $table->string("tag_2");
            $table->string("main_title");
            $table->string('description');
            $table->unsignedBigInteger('category_id');
            $table->integer('status')->default(0);
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('carousel_settings');
    }
};
