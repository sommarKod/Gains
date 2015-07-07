<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use App\Muscle;

class MuscleAlias extends Model
{
    protected $hidden = array('created_at','updated_at');
    protected $fillable = ['name', 'muscle_id'];
    public function muscle()
    {
        return $this->hasOne('App\Muscle');
    }

}
