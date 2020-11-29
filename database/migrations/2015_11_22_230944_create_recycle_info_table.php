<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateRecycleInfoTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('recycle_info', function(Blueprint $table) {
            $table->increments('id');

            $table->string('name');
            $table->string('description');
            $table->string('size');

            $table->integer('recycle_id')->unsigned();
            $table->foreign('recycle_id')->references('id')->on('recycle')->onDelete('cascade');

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
        Schema::drop('recycle_info');
    }
}
