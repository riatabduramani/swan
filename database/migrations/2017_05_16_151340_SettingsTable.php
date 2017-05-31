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
            $table->engine = 'InnoDB';
            $table->increments('id');
            $table->string('company_logo')->nullable();
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
            $table->text('company_keywords')->nullable();

            $table->timestamps();
        });

        Schema::create('settings_translations', function (Blueprint $table) {
            $table->engine = 'InnoDB';
            $table->increments('id');
            $table->integer('settings_id')->unsigned();
            $table->string('company_name')->nullable();
            $table->string('company_slogan')->nullable();
            $table->text('company_shortdescription')->nullable();
            $table->text('address')->nullable();
            $table->string('locale')->index();
            $table->unique(['settings_id','locale']);
            $table->foreign('settings_id')->references('id')->on('settings')->onDelete('cascade');
         });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('settings_translations');
        Schema::dropIfExists('settings');
    }
}
