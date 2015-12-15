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
    public function progress($courseId) {
        $tasksFinished = \Auth::user()->tasks()
                                ->where('task_user.status', 1)
                                ->where('task_user.course_id', $courseId)
                                ->where('task_user.subject_id', $this->attributes['id'])
                                ->count();
        $tasksNotFinished = \Auth::user()->tasks()
                                    ->where('task_user.status', 0)
                                    ->where('task_user.course_id', $courseId)
                                    ->where('task_user.subject_id', $this->attributes['id'])
                                    ->count();
        $subjectProgress = ($tasksFinished / ($tasksFinished + $tasksNotFinished)) * 100;
        return $subjectProgress;
    }
}
