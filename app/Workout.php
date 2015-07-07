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
}
