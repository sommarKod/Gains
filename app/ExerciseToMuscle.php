<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class ExerciseToMuscle extends Model
{
    /**
     * The table associated with the model.
     *
     * @var string
     */
    protected $table = 'exercise_to_muscle';
    protected $fillable = ['muscle_intensity', 'muscle_id', 'exercise_id'];
}
