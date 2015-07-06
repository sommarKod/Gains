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
            $table->foreign('muscle_id')->references('id')->on('muscles');
            $table->foreign('exercise_id')->references('id')->on('exercise');
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
