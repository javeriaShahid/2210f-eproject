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
        Schema::create('deals_banners', function (Blueprint $table) {
            $table->id();
            $table->string("image");
            $table->string("title");
            $table->string("side");
            $table->string("text_color");
            $table->string("title_color");
            $table->unsignedBigInteger("category_id");
            $table->longtext("short_description")->nullable();
            $table->integer("percent_off");
            $table->integer("status")->default(0);
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('deals_banners');
    }
};
