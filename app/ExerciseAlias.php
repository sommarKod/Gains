<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use App\Exercise;

class ExerciseAlias extends Model
{
    protected $fillable = ['name', 'exercise_id'];


    public function exercise()
    {
        return $this->hasOne('App\Exercise');
    }

}
