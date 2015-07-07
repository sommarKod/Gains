<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class AddOrderingOnWorkouts extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('exercise_workout', function (Blueprint $table) {
            $table->integer('position');
        });
        Schema::table('workout_workout_plan', function (Blueprint $table) {
            $table->integer('position');
        });

    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('workouts', function (Blueprint $table) {
            $table->dropColumn('position');
        });
        Schema::table('workout_workout_plan', function (Blueprint $table) {
            $table->dropColumn('position');
        });
    }
}
