<?php

namespace App\Repositories;

use App\CourseSubject;

class CourseSubjectRepository
{    
    public function updateByCourseIdAndSubjectId($subjectId, $courseId, $courseSubject)
    {
        return CourseSubject::whereSubjectId($subjectId)
                            ->whereCourseId($courseId)
                            ->update($courseSubject);
    }
}
