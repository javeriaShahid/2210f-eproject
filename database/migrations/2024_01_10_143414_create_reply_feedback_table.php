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
        Schema::create('reply_feedback', function (Blueprint $table) {
            $table->id();
            $table->longText('message');
            $table->unsignedBigInteger('feedback_id');
            $table->unsignedBigInteger("admin_id");
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('reply_feedback');
    }
};
