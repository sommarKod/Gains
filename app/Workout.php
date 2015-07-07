<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use App\WorkoutPlan;
use App\Exercise;

class Workout extends Model
{
    protected $hidden = array('created_at','updated_at');
    protected $fillable = ['name'];

    public function workoutPlan()
    {
        return $this->belongsToMany('App\WorkoutPlan');
    }
    public function exercises()
    {
        return $this->belongsToMany('App\Exercise');
    }

    public function attachToExercise($exercises){
        foreach($exercises as $exercise)  {
            $exercise_id = Exercise::where('name', $exercise[0])->first();
            $this->exercises()->attach($exercise_id, ['position' => $exercise[1]]);
        }
    }
    public function attachToWorkoutPlan($workout_plans){
        foreach($workout_plans as $workout_plan)  {
            $this->workout()->attach($workout_plan[0], ['position' => $workout_plan[1]]);
        }
    }
}
