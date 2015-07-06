<?php

namespace App;

use Illuminate\Database\Eloquent\Model;


class Muscle extends Model
{
    protected $fillable = ['name'];
    public function exercises()
    {
        return $this->belongsToMany('Exercise', 'exercise_to_muscle');
    }
}
