<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class Leads extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('comments', function (Blueprint $table) {
            $table->increments('id');
            $table->text('body');
            $table->integer('commentable_id')->nullable();
            $table->string('commentable_type')->nullable();
            
            $table->string('created_by')->nullable();

            $table->integer('commented_by')->unsigned()->nullable();

            $table->foreign('commented_by')->references('id')->on('users')
                ->onUpdate('cascade')->onDelete('cascade')->onDelete('set null');

            $table->integer('updated_by')->unsigned()->nullable();

            $table->foreign('updated_by')->references('id')->on('users')
                ->onUpdate('cascade')->onDelete('cascade')->onDelete('set null');

            $table->timestamps();
        });

        Schema::create('customer_statuses', function (Blueprint $table) {
            $table->increments('id');
            $table->string('name');
            $table->timestamps();
        });


        Schema::create('potential_customer', function (Blueprint $table) {
            $table->increments('id');
            
            $table->string('name');
            $table->string('surname');
            $table->string('phone');
            $table->string('email');
            $table->integer('customer_status_id')->unsigned();
            $table->integer('district_id')->unsigned()->nullable();
            
            $table->string('created_by')->nullable();
            $table->integer('updated_by')->unsigned()->nullable();

            $table->foreign('customer_status_id')->references('id')->on('customer_statuses')
                ->onUpdate('cascade')->onDelete('no action');

            $table->foreign('district_id')->references('id')->on('district')
                ->onUpdate('cascade')->onDelete('set null');

            $table->foreign('updated_by')->references('id')->on('users')
                ->onUpdate('cascade')->onDelete('set null');

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
        Schema::dropIfExists('potential_customer');
        Schema::dropIfExists('customer_statuses');
        Schema::dropIfExists('comments');
    }
}
