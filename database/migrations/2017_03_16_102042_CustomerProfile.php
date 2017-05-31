<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CustomerProfile extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
         Schema::create('packets', function (Blueprint $table) {
            $table->engine = 'InnoDB';
            $table->increments('id');
            $table->decimal('price')->nullable();
            $table->decimal('new_price');
            $table->string('options');
            $table->timestamps();
         });

         Schema::create('packet_translations', function (Blueprint $table) {
            $table->engine = 'InnoDB';
            $table->increments('id');
            $table->integer('packet_id')->unsigned();
            $table->string('name');
            $table->string('locale')->index();
            $table->unique(['packet_id','locale']);
            $table->foreign('packet_id')->references('id')->on('packets')->onDelete('cascade');
         });

        Schema::create('customer', function (Blueprint $table) {
            $table->engine = 'InnoDB';
            $table->increments('id');
            $table->integer('user_id')->unsigned();
            $table->string('phone_out');
            $table->string('phone_in');
            
            $table->text('address_out');
            $table->integer('postal_out');
            $table->string('city');
            $table->integer('country_id')->unsigned();

            $table->text('address_in');
            $table->integer('city_in_id')->unsigned();
            $table->integer('district_in_id')->unsigned();
            $table->integer('country_in_id')->unsigned();


            $table->string('emergencycontact')->nullable();
            $table->string('emergencyphone')->nullable();

            $table->string('created_by')->nullable();
            $table->integer('updated_by')->unsigned()->nullable();

            $table->integer('packet_id')->unsigned()->nullable();

            $table->timestamps();

            $table->foreign('packet_id')->references('id')->on('packets')
                ->onUpdate('cascade')->onDelete('cascade');

            $table->foreign('user_id')->references('id')->on('users')
                ->onUpdate('cascade')->onDelete('cascade');

            $table->foreign('updated_by')->references('id')->on('users')
                ->onUpdate('cascade')->onDelete('cascade');

            $table->foreign('city_in_id')->references('id')->on('cities')
                ->onUpdate('cascade')->onDelete('cascade');

            $table->foreign('country_id')->references('id')->on('countries')
                ->onUpdate('cascade')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('customer');
        Schema::dropIfExists('packet_translations');
        Schema::dropIfExists('packets');
    }
}
