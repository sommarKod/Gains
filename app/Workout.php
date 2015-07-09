<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use App\WorkoutPlan;
use App\Exercise;

class Workout extends Model
{
    protected $hidden = array('created_at','updated_at');
    protected $fillable = ['name'];

    public function workoutPlans()
    {
        return $this->belongsToMany('App\WorkoutPlan')->withPivot('position');
    }
    public function exercises()
    {
        return $this->belongsToMany('App\Exercise')->withPivot('position');
    }

    public function updateExercises($exercises){
        $this->exercises()->detach();
        foreach($exercises as $pos =>$exercise)  {
            $this->exercises()->attach($exercise['id'], ['position' => $pos]);
       }
    }
    public function attachToWorkoutPlan($workout_plans){
        foreach($workout_plans as $workout_plan)  {
            $workout_plan_id = WorkoutPlan::where('name', $workout_plan[0])->first();
            $this->workoutPlans()->attach($workout_plan_id, ['position' => $workout_plan[1]]);
        }
    }
    public function addExercises($exercises){
        foreach($exercises as $exercise)  {
            $exercise_id = Exercise::where('name', $exercise[0])->first();
            $this->exercises()->attach($exercise_id, ['position' => $exercise[1]]);
        }
    }
    public function removeAllExercises(){
        $this->exercises()->detach();
    }

}
