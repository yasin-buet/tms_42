<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Course extends Model
{
    public function subjects()
    {
        return $this->belongsToMany('App\Subject');
    }
    public function supervisor()
    {
        return $this->belongsTo('App\User', 'supervisor_id');
    }
}
