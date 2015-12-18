<?php

namespace App\Http\Controllers\Supervisor;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;
use App\Course;
use App\User;
use App\Subject;
use App\Repositories\CourseRepository;

class CoursesController extends Controller
{
    protected $courses;
    public function __construct(CourseRepository $courses)
    {
        $this->middleware('supervisor');
        $this->courses = $courses;
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('supervisor.courses.index', ['courses' => $this->courses->allCourseWithPaginate()]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('supervisor.courses.create', ['subjects' => $this->courses->allSubjects()]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $this->validate($request, [
            'name' => 'required|max:255',
            'description' => 'required',
        ]);
        $input = $request->all();
        Course::create($input)->subjects()->attach($request->input('subjects'));
        return redirect()->action('Supervisor\CoursesController@index');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        return view('supervisor.courses.show', ['course' => $this->courses->courseWithSubjects($id)]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        return view('supervisor.courses.edit', ['course' =>$this->courses->findCourse($id), 'supervisors' => $this->courses->supervisors()]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $course = $this->courses->findCourse($id);
        $this->validate($request, [
            'name' => 'required',
            'description' => 'required',
            'supervisor_id' => 'required'
        ]);
        $input = $request->all();
        $course->update($input);
        return redirect()->back();
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $this->courses->destroyCourse($id);
        return redirect()->back();
    }
}
