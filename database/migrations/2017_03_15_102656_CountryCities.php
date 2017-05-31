<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CountryCities extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('countries', function (Blueprint $table) {
            $table->engine = 'InnoDB';
            $table->increments('id');
            $table->string('code');
            $table->string('name');
            $table->timestamps();
        });

        Schema::create('cities', function (Blueprint $table) {
            $table->engine = 'InnoDB';
            $table->increments('id');
            $table->string('name');
            $table->integer('country_id')->unsigned();

            $table->foreign('country_id')->references('id')->on('countries')
                ->onUpdate('cascade')->onDelete('cascade');

            $table->timestamps();
        });

        Schema::create('district', function (Blueprint $table) {
            $table->engine = 'InnoDB';
            $table->increments('id');
            $table->string('name');
            $table->integer('city_id')->unsigned();

            $table->foreign('city_id')->references('id')->on('cities')
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
        Schema::dropIfExists('district');
        Schema::dropIfExists('cities');
        Schema::dropIfExists('countries');
    }
}
