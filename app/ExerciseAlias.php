<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class ExerciseAlias extends Model
{
    protected $hidden = array('created_at','updated_at');
    public function exercise()
    {
        return $this->hasOne('App\Exercise');
    }
}
