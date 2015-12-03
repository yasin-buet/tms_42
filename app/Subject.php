<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Subject extends Model
{
    protected $fillable = ['name', 'description'];
    public function tasks() 
    {
        return $this->hasMany('App\Task');
    }
}
