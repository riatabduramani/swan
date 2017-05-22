<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class SettingsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('settings', function (Blueprint $table) {
            $table->increments('id');
            $table->string('company_name');
            $table->string('company_slogan_sq')->nullable();
            $table->string('company_slogan_en')->nullable();
            $table->string('company_logo')->nullable();
            $table->text('company_shortdescription')->nullable();
            $table->text('company_keywords')->nullable();
            $table->text('address_sq');
            $table->text('address_en');
            $table->string('mob')->nullable();
            $table->string('mob1')->nullable();
            $table->string('phone');
            $table->string('phone1')->nullable();
            $table->string('fax')->nullable();
            $table->string('email');
            $table->string('email1')->nullable();
            $table->string('facebook')->nullable();
            $table->string('youtube')->nullable();
            $table->string('linkedin')->nullable();
            $table->string('googleplus')->nullable();
            $table->string('instagram')->nullable();
            $table->string('currency')->nullable();
            $table->text('googleanalytics')->nullable();
            $table->text('googlemap')->nullable();

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
        Schema::dropIfExists('settings');
    }
}
