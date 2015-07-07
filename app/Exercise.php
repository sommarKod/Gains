<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use App\Muscle;
use Log;
use DB;

class Exercise extends Model
{
    protected $fillable = ['name'];

    public function muscles()
    {
        return $this->belongsToMany('App\Muscle');
    }
    public function exerciseAlias()
    {
        return $this->hasMany('App\ExerciseAlias');
    }
    public function attachToMuscle($muscles){

        foreach($muscles as $muscle)  {
            $muscle_id = Muscle::where('name', $muscle[0])->first();
            $this->muscles()->attach($muscle_id, ['muscle_intensity' => $muscle[1]]);
        }
    }
}
