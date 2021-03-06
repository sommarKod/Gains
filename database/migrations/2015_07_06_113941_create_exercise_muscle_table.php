<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateExerciseMuscleTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('exercise_muscle', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('muscle_intensity');
            $table->integer('muscle_id')->unsigned();
            $table->integer('exercise_id')->unsigned();
            $table->foreign('muscle_id')->references('id')->on('muscles');
            $table->foreign('exercise_id')->references('id')->on('exercises');
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
        Schema::drop('exercise_muscle');
    }
}
