<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateRecycleRecycleTypePivotTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('recycle_recycle_type', function(Blueprint $table) {
            
            $table->integer('recycle_id')->unsigned();
            $table->foreign('recycle_id')->references('id')->on('recycle')->onDelete('cascade');

            $table->integer('recycle_type_id')->unsigned();
            $table->foreign('recycle_type_id')->references('id')->on('recycle_type')->onDelete('cascade');

        });

    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::drop('recycle_recycle_type');
    }
}
