<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class Pages extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('pages', function (Blueprint $table) {
            $table->engine = 'InnoDB';
            $table->increments('id');
            $table->timestamps();
        });

        Schema::create('pages_translations', function (Blueprint $table) {
            $table->engine = 'InnoDB';
            $table->increments('id');
            $table->text('about')->nullable();
            $table->text('vision')->nullable();
            $table->text('mission')->nullable();
            $table->string('locale')->index();
            $table->integer('pages_id')->unsigned();
            $table->unique(['pages_id','locale']);
            $table->foreign('pages_id')->references('id')->on('pages')->onDelete('cascade');
         });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('pages_translations');
        Schema::dropIfExists('pages');
    }
}
