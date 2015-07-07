<?php

namespace App;

use Illuminate\Database\Eloquent\Model;


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

}
