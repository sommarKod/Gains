<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class MuscleAlias extends Model
{
    public function muscle()
    {
        return $this->hasOne('App\Muscle');
    }
}
