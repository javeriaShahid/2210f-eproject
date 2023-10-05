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
        Schema::table('checkouts', function (Blueprint $table) {
            $table->string('tracking_id')->after('id');
            $table->unsignedBigInteger('product_id')->after('cart_id');
            $table->unsignedBigInteger('address_id')->after('product_id');
            $table->string('order_placed_date')->after('user_id');
            $table->integer('total_price')->after('address_id');
            $table->string('delivery_date')->after('order_placed_date');
            $table->integer('is_delivered')->after('delivery_date')->default(0);
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('checkouts', function (Blueprint $table) {
            $table->dropColumn('tracking_id');
            $table->dropColumn('product_id');
            $table->dropColumn('address_id');
            $table->dropColumn('total_price');
            $table->dropColumn('order_placed_date');
            $table->dropColumn('delivery_date');
            $table->dropColumn('is_delivered');
        });
    }
};
