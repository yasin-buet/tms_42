<?php

use Illuminate\Foundation\Testing\WithoutMiddleware;
use Illuminate\Foundation\Testing\DatabaseMigrations;
use Illuminate\Foundation\Testing\DatabaseTransactions;
use App\Course;
use App\Subject;
use App\User;
use App\CourseSubject;
use App\Repositories\CourseRepository;

class CourseRepositoryTest extends TestCase
{
    use DatabaseTransactions;
    /**
     * A basic test example.
     *
     * @return void
     */
    protected $courseRepository;
    public function __construct()
    {
        $this->courseRepository = new CourseRepository;
    }
    public function testAllCourses()
    {
        $countCourse = count(Course::all());
        $course = factory(Course::class)->create([
            'name' => 'course-1'
        ]);
        $courses = $this->courseRepository->allCourseWithPaginate();
        $this->seeInDatabase('courses', ['name' => $courses[$countCourse]->name]);
    }
    public function testAllSubjects()
    {
        $countSubject = count(Subject::all());
        $subject = factory(Subject::class)->create([
            'name' => 'subject-1',
        ]);
        $subjects = $this->courseRepository->allSubjects();
        $this->seeInDatabase('subjects', ['name' => $subjects[$countSubject]->name]);
    }
    public function testFindCourse()
    {
        $id = count(Course::all()) + 1;
        $singleCourse = factory(Course::class)->create([
            'id' => $id
        ]);
        $course = $this->courseRepository->findCourse($id);
        $this->seeInDatabase('courses', ['id' => $course->id]);
        $secondId = $id + 1;
        $secondCourse = $this->courseRepository->findCourse($secondId);
        $this->assertNull($secondCourse);
    }
    public function testCourseWithSubjects()
    {
        $courseId = count(Course::all()) + 1;
        $singleCourse = factory(Course::class)->create([
            'id' => $courseId,
            'name' => 'course-1'
        ]);
        $courseSubjectId = count(CourseSubject::all()) + 1;
        $subjectId = count(Subject::all()) + 1;
        $courseSubject = factory(CourseSubject::class)->create([
            'id' => $courseSubjectId,
            'course_id' => $courseId,
            'subject_id' => $subjectId
        ]); 
        $courseWithSubjects = $this->courseRepository->courseWithSubjects($courseId);
        $count = count($courseWithSubjects->subjects); 
        $this->seeInDatabase('courses', ['id' => $courseWithSubjects->id]);
        $this->seeInDatabase('subjects', ['id' => $courseWithSubjects->subjects[$count-1]->id]);
        $this->seeInDatabase('course_subject', ['course_id' => $courseWithSubjects->id, 'subject_id' =>$courseWithSubjects->subjects[$count-1]->id]);
    }
    public function testSupervisors()
    {
        $countUser = count(User::supervisor());
        $supervisor = factory(User::class)->create([
            'name' => 'supervisor-1',
            'role' => 1
        ]);
        $supervisors = $this->courseRepository->supervisors();
        $this->assertContains('supervisor-1', $supervisors);         
    }
    public function testDestroyCourse()
    {
        $countCourse = count(App\Course::all());
        $course = factory(App\Course::class)->create([
            'id' => $countCourse + 1,
            'name' => 'course-3'
        ]);
        $index = ($countCourse + 1);
        $courses = $this->courseRepository->destroyCourse($index);
        $this->assertNotContains('course-3', App\Course::all());
    }
}