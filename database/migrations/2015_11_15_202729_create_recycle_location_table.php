<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateRecycleLocationTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('recycle_location', function(Blueprint $table) {
            $table->increments('id');

            $table->string('lng');
            $table->string('lat');
            $table->string('pitch');
            $table->string('heading');
            $table->string('address')->nullable();
            $table->string('postal_code')->nullable();
            $table->string('city')->nullable();
            $table->string('country')->nullable();

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
        Schema::drop('recycle_location');
    }
}
