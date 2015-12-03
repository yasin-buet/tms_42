<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Task extends Model
{
    protected $fillable = ['subjct_id', 'name', 'description'];
    public function subject()
    {
        return $this->belongsTo('App\Subject');
    }
}
