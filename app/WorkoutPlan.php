<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use App\Workout;

class WorkoutPlan extends Model
{
    public function workouts()
    {
        return $this->belongsToMany('App\Workout');
    }
    public function attachToWorkout($workouts){
        foreach($workouts as $workout)  {
            $this->workoutPlan()->attach($workout[0], ['position' => $workout[1]]);
        }
    }
}
