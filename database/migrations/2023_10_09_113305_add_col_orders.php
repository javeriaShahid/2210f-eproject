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
       Schema::table('checkouts' , function(Blueprint $table){
        $table->string('customer_name')->after('id');
        $table->string('customer_email')->after('customer_name');
       });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('checkouts' , function(Blueprint $table){
            $table->dropColumn('customer_name');
            $table->dropColumn('customer_email');
           });
    }
};
