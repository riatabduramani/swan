<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class ToDoList extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
          Schema::create('todolist', function (Blueprint $table) {
            $table->increments('id');
            $table->string('title');
            $table->text('description');

            $table->integer('assigned_to')->unsigned()->nullable();

            $table->integer('customer_id')->unsigned()->nullable();
            $table->integer('created_by')->unsigned()->nullable();

            $table->integer('updated_by')->unsigned()->nullable();
            $table->dateTime('duedate');
            $table->dateTime('datedone')->nullable();

            $table->foreign('created_by')->references('id')->on('users')
                ->onUpdate('cascade')->onDelete('cascade');

            $table->foreign('assigned_to')->references('id')->on('users')
                ->onUpdate('cascade')->onDelete('set null');

            $table->foreign('customer_id')->references('id')->on('customer')
                ->onUpdate('cascade')->onDelete('cascade');

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
        Schema::dropIfExists('todolist');
    }
}
