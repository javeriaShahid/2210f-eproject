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
        Schema::create('products', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('subcategory_id');
            $table->unsignedBigInteger('category_id');
            $table->string('name');
            $table->longText('description');
            $table->longText('short_description');
            $table->integer('price');
            $table->integer('stock');
            $table->string('image');
            $table->integer('weight');
            $table->string('weight_type');
            $table->integer('is_published')->default(0);
            $table->string('color_code');
            $table->string('sku');
            $table->string('deleted_at')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('products');
    }
};
