<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CustomerDocuments extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
         Schema::create('documents', function (Blueprint $table) {
            $table->increments('id');
            $table->string('name');
            $table->text('description')->nullable();
            $table->string('renamed');
            $table->string('extension');
            $table->integer('type');
            $table->integer('created_by')->unsigned()->nullable();

             $table->foreign('created_by')->references('id')->on('users')
                ->onUpdate('cascade')->onDelete('set null');

            $table->timestamps();
            });

        Schema::create('customer_document', function (Blueprint $table) {
            $table->integer('customer_id')->unsigned();
            $table->integer('document_id')->unsigned();

            $table->foreign('customer_id')->references('id')->on('customer')
                ->onUpdate('cascade')->onDelete('cascade');

            $table->foreign('document_id')->references('id')->on('documents')
                ->onUpdate('cascade')->onDelete('cascade');

            $table->primary(['customer_id', 'document_id']);
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('customer_document');
        Schema::dropIfExists('documents');
    }
}
