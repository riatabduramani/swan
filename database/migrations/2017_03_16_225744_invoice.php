<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;
use Illuminate\Support\Facades\DB;

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
            //invoice_type (packets, or custom service, shortcode (0 - defined, 1 - custom))
            $table->boolean('invoice_type')->default(0);
            $table->integer('service_id');
            $table->dateTime('invoice_date');
            $table->date('due_date')->nullable();
            
            //the end date for the service
            $table->dateTime('end_date')->nullable();

            $table->string('description')->nullable();
            $table->integer('customer_id')->unsigned();
            //payment_method (cash. online, bank)
            $table->integer('payment_method')->nullable();
            //payment_status (paid/unpaid/pending/declined)
            $table->integer('payment_status');
            $table->decimal('total_sum');

            $table->dateTime('paid_at')->nullable();
            $table->dateTime('declined_at')->nullable();

            $table->string('created_by')->nullable();
            
            $table->integer('updated_by')->unsigned()->nullable();

            $table->foreign('customer_id')->references('id')->on('users')
                ->onUpdate('cascade')->onDelete('cascade');

            $table->foreign('updated_by')->references('id')->on('users')
                ->onUpdate('cascade')->onDelete('set null');

            $table->timestamps();
         });

    DB::update("ALTER TABLE invoice AUTO_INCREMENT = 1000;");

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
