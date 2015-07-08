<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateMuscleMuscleGroupTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('muscle_muscle_group', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('muscle_id')->unsigned();
            $table->integer('muscle_group_id')->unsigned();
            $table->foreign('muscle_id')->references('id')->on('muscles');
            $table->foreign('muscle_group_id')->references('id')->on('muscle_groups');
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
        Schema::drop('muscle_muscle_group');
    }
}
