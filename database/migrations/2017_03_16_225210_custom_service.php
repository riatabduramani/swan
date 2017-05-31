<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CustomService extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
   public function up()
    {
        Schema::create('custom_service', function (Blueprint $table) {
            $table->engine = 'InnoDB';
            $table->increments('id');
            $table->string('name');
            $table->text('description');
            $table->string('created_by')->nullable();
            $table->integer('updated_by')->unsigned()->nullable();

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
        Schema::dropIfExists('custom_service');
    }
}
