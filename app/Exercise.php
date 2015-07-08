<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use App\Muscle;
use Log;
use DB;

class Exercise extends Model
{
    protected $hidden = array('created_at','updated_at');
    protected $fillable = ['name'];

    public function muscles()
    {
        return $this->belongsToMany('App\Muscle')->withPivot('muscle_intensity');
    }
    public function exerciseAlias()
    {
        return $this->hasMany('App\ExerciseAlias');
    }
    public function workouts()
    {
        return $this->belongsToMany('App\Exercise')->withPivot('position');
    }
    public function attachToMuscle($muscles){

        foreach($muscles as $muscle)  {
            $muscle_id = Muscle::where('name', $muscle[0])->first();
            $this->muscles()->attach($muscle_id, ['muscle_intensity' => $muscle[1]]);
        }
    }
}
