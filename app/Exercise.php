<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Exercise extends Model
{
    protected $fillable = ['name'];



    public function muscles()
    {
        return $this->belongsToMany('App\Muscle', 'exercise_to_muscle');
    }
}
