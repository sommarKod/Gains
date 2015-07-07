<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class MuscleAlias extends Model
{
    protected $hidden = array('created_at','updated_at');
    public function muscle()
    {
        return $this->hasOne('App\Muscle');
    }
}
