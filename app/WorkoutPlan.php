<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use App\Workout;

class WorkoutPlan extends Model
{
    protected $hidden = array('created_at','updated_at');
    protected $fillable = ['name'];

    public function workouts()
    {
        return $this->belongsToMany('App\Workout')->withPivot('position');
    }
    public function addWorkouts($workouts){
        foreach($workouts as $workout)  {
            $workout_id = Workout::where('name', $workout[0])->first();
            $this->workouts()->attach($workout_id, ['position' => $workout[1]]);
        }
    }
}
