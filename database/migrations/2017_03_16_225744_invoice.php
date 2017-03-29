<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class Invoice extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
     public function up()
    {
        Schema::create('invoice', function (Blueprint $table) {
            $table->increments('id');
            
            $table->integer('invoice_nr');
            //invoice_type (packets, or custom service, shortcode (0 - defined, 1 - custom))
            $table->boolean('invoice_type')->default(0);
            $table->integer('service_id');
            $table->boolean('invoice_date');
            $table->boolean('due_date');
            
            //the end date for the service
            $table->boolean('end_date');

            $table->string('description');
            $table->integer('customer_id')->unsigned();
            //payment_method (cash. online, bank)
            $table->boolean('payment_method');
            //payment_status (paid/unpaid/pending/declined)
            $table->boolean('payment_status');
            $table->decimal('total_sum');

            $table->integer('created_by')->unsigned();
            $table->integer('updated_by')->unsigned()->nullable();

            $table->foreign('customer_id')->references('id')->on('users')
                ->onUpdate('cascade')->onDelete('cascade');

            $table->foreign('created_by')->references('id')->on('users')
                ->onUpdate('cascade')->onDelete('cascade');

            $table->foreign('updated_by')->references('id')->on('users')
                ->onUpdate('cascade')->onDelete('cascade');

            $table->timestamps();
         });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('invoice');
    }
}
