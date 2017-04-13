<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class Subscription extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
           Schema::create('subscription', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('invoice_id')->unsigned();
            $table->integer('customer_id')->unsigned();
            $table->integer('packet_id')->unsigned();
            $table->dateTime('start');
            $table->dateTime('end');

             $table->foreign('invoice_id')->references('id')->on('invoice')
                ->onUpdate('cascade')->onDelete('cascade');

            $table->foreign('packet_id')->references('id')->on('packets')
                ->onUpdate('cascade')->onDelete('cascade');

            $table->foreign('customer_id')->references('id')->on('customer')
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
        Schema::dropIfExists('subscription');
    }
}
