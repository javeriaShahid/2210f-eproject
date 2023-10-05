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
            $table->unsignedBigInteger('user_id');
            $table->longText('addressline1')->nullable();
            $table->longText('addressline2')->nullable();
            $table->unsignedBigInteger('country');
            $table->unsignedBigInteger('state');
            $table->unsignedBigInteger('city');
            $table->string('postalcode');
            $table->string('phone_number1')->nullable();
            $table->string('phone_number2')->nullable();
            $table->string('deleted_at')->nullable();
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
