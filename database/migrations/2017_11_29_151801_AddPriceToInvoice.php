<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class AddPriceToInvoice extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('invoice', function (Blueprint $table) {
            $table->integer('months')->after('end_date')->nullable();
            $table->decimal('price')->after('payment_status')->nullable();
            $table->decimal('price_mkd')->after('payment_status')->nullable();
            $table->decimal('total_sum_mkd')->after('total_sum')->nullable();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('invoice', function (Blueprint $table) {
            
        });
    }
}
