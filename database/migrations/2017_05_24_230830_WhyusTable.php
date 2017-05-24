<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class WhyusTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('whyus', function (Blueprint $table) {
            $table->increments('id');
            $table->timestamps();
        });

        Schema::create('whyus_translations', function (Blueprint $table) {
            $table->increments('id');
            $table->text('title')->nullable();
            $table->text('description')->nullable();
            $table->string('locale')->index();
            $table->integer('whyus_id')->unsigned();
            $table->unique(['whyus_id','locale']);
            $table->foreign('whyus_id')->references('id')->on('whyus')->onDelete('cascade');
         });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('whyus_translations');
        Schema::dropIfExists('whyus');
    }
}
