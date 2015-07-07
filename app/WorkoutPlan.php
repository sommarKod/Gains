<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use App\Workout;

class WorkoutPlan extends Model
{
    public function workout()
    {
        return $this->belongsToMany('App\Workout');
    }
}
