<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class ExerciseAlias extends Model
{
    public function exercise()
    {
        return $this->hasOne('App\Exercise');
    }
}
