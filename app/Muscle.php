<?php

namespace App;

use Illuminate\Database\Eloquent\Model;


class Muscle extends Model
{
    protected $fillable = ['name'];

    public function exercises()
    {
        return $this->belongsToMany('App\Exercise');
    }
    public function muscleAlias()
    {
        return $this->hasMany('App\MuscleAlias');
    }

}
