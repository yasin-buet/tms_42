<?php

namespace App\Repositories;

use App\Subject;
use App\Course;
use App\User;

class CourseRepository
{
    /**
     * Get all of the tasks for a given user.
     *
     * @param  User  $user
     * @return Collection
     */
    public function allCourseWithPaginate()
    {
        return Course::orderBy('id')
                    ->paginate(\Config::get('paginate.paginate_no'));
    }
    public function allSubjects()
    {
        return Subject::all();
    }
    public function courseWithSubjects($id)
    {
        return Course::with('subjects')->find($id);
    }
    public function findCourse($id)
    {
        return Course::find($id);
    }
    public function supervisors()
    {
        return User::supervisor()->lists('name', 'id');
    }
    public function destroyCourse($id)
    {
        return Course::destroy($id);
    }
}