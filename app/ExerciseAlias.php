<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use App\Exercise;

class ExerciseAlias extends Model
{
    protected $hidden = array('created_at','updated_at');
    protected $fillable = ['name', 'exercise_id'];

    public function exercise()
    {
        return $this->hasOne('App\Exercise');
    }

}
