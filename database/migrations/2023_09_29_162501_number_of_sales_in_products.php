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
        Schema::table('products', function (Blueprint $table) {
            $table->unsignedBiginteger('number_of_sales')->default(0);
            $table->unsignedBiginteger('brand_id');
            $table->unsignedBiginteger('sale_status')->default(0);
            $table->integer('discounted_price')->nullable();
            $table->integer('discount_percentage')->nullable();
            $table->date('discounted_start_time')->nullable();
            $table->date('discounted_end_time')->nullable();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('products', function (Blueprint $table) {
            $table->dropColumn('number_of_sales');
            $table->dropColumn('sale_status')->default(0);
            $table->dropColumn('discount_percentage')->nullable();
            $table->dropColumn('discounted_price');
            $table->dropColumn('discounted_start_time');
            $table->dropColumn('discounted_end_time');
            $table->dropColumn('brand_id');

        });
    }
};
