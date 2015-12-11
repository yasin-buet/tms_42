<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Course extends Model
{
    protected $fillable = ['name', 'description', 'supervisor_id'];
    public function subjects()
    {
        return $this->belongsToMany('App\Subject');
    }
    public function supervisor()
    {
        return $this->belongsTo('App\User', 'supervisor_id');
    }
    public function users()
    {
        return $this->belongsToMany('App\User');
    }
}
