<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateExerciseToMuscleTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('exercise_to_muscle', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('muscle_id')->unsigned();
            $table->integer('exercise_id')->unsigned();
            $table->foreign('muscle_id')->references('id')->on('muscles');
            $table->foreign('exercise_id')->references('id')->on('exercises');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::drop('exercise_to_muscle');
    }
}
