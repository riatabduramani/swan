<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class Packets extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
         Schema::create('packets', function (Blueprint $table) {
            $table->increments('id');
            $table->decimal('price');
            $table->string('options');
            $table->timestamps();
         });

         Schema::create('packet_translations', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('packet_id')->unsigned();
            $table->string('name');
            $table->string('locale')->index();
            $table->unique(['packet_id','locale']);
            $table->foreign('packet_id')->references('id')->on('packets')->onDelete('cascade');
         });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('packet_translations');
        Schema::dropIfExists('packets');
    }
}
