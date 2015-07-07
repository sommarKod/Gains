<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use App\WorkoutPlan;

class Workout extends Model
{
    public function workoutPlan()
    {
        return $this->belongsToMany('App\WorkoutPlan');
    }
    public function exercises()
    {
        return $this->belongsToMany('App\Exercise');
    }


    public function attachToWorkoutPlan($workout_plans){
        foreach($workout_plans as $workout_plan)  {
            $this->workout()->attach($workout_plan[0], ['position' => $workout_plan[1]]);
        }
    }
}
