<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateMuscleAliasTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('muscle_aliases', function (Blueprint $table) {
            $table->increments('id');
            $table->string('name');
            $table->integer('muscle_id')->unsigned();
            $table->foreign('muscle_id')->references('id')->on('muscles');
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
        Schema::drop('muscle_aliases');
    }
}
