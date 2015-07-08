<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use App\MuscleGroup;


class Muscle extends Model
{
    protected $hidden = array('created_at','updated_at');
    protected $fillable = ['name'];

    public function exercises()
    {
        return $this->belongsToMany('App\Exercise')->withPivot('muscle_intensity');
    }
    public function muscleAlias()
    {
        return $this->hasMany('App\MuscleAlias');
    }
    public function muscleGroups()
    {
        return $this->belongsToMany('App\MuscleGroup');
    }
    public function attachToMuscleGroups($muscleGroups){
        foreach($muscleGroups as $muscleGroup)  {
            $muscle_group_id = MuscleGroup::where('name', $muscleGroup);
            $this->muscleGroups()->attach($muscle_group_id);
        }
    }
}
