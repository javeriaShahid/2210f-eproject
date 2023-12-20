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
        Schema::create('home_links', function (Blueprint $table) {
            $table->id();
            $table->string('route')->nullable();
            $table->string('div_id')->nullable();
            $table->integer('sortId')->default(0);
            $table->string('title');
            $table->string('status')->default(0);
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('home_links');
    }
};
