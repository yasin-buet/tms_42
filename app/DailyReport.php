<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class DailyReport extends Model
{
    protected $fillable = ['user_id', 'start_time', 'end_time', 'achievement', 'next_day_plan', 'comment'];
    public function user()
    {
        return $this->belongsTo('App\User');
    }
}
