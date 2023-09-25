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
        Schema::create('user_addresses', function (Blueprint $table) {
            $table->id();
            $table->string('addressline1')->nullable();
            $table->string('addressline2')->nullable();
            $table->unsignedBigInteger('country');
            $table->unsignedBigInteger('state');
            $table->unsignedBigInteger('city');
            $table->string('postalcode');
            $table->integer('phone-number1');
            $table->integer('phone-number2');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('user_addresses');
    }
};
