<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Exercise extends Model
{
    protected $hidden = array('created_at','updated_at');
    protected $fillable = ['name'];

    public function muscles()
    {
        return $this->belongsToMany('App\Muscle');
    }
    public function exerciseAlias()
    {
        return $this->hasMany('App\ExerciseAlias');
    }
}
