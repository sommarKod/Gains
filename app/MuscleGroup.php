<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use App\Muscle;

class MuscleGroup extends Model
{
    protected $hidden = array('created_at','updated_at');
    protected $fillable = ['name'];

    public function muscles()
    {
        return $this->belongsToMany('App\Muscle');
    }
    public function addMuscles($muscles){
        foreach($muscles as $muscle)  {
            $muscle_id = Muscle::where('name', $muscle)->first();
            $this->muscles()->attach($muscle_id);
        }
    }
}
