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
        Schema::create('settings', function (Blueprint $table) {
            $table->id();
            $table->longText('logo');
            $table->longText('x_icon');
            $table->string('title');
            $table->string('contact');
            $table->string('email');
            $table->string('designed_year');
            $table->string('designed_by');
            $table->string('country_city');
            $table->string('i_frame_link');
            $table->longText('address');
            $table->longText('map_link');
            $table->integer('status')->default(0);
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('settings');
    }
};
