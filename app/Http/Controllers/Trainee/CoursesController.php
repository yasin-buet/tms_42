<?php

namespace App\Http\Controllers\Trainee;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;
use App\Course;
use App\SubjectUser;
use GrahamCampbell\Dropbox\Facades\Dropbox;

class CoursesController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        Dropbox::createFolder('/foo');
        $courses = Course::orderBy('id')->paginate(\Config::get('paginate.paginate_no'));
        return view('trainee.courses.index', compact('courses'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $course = Course::with('subjects')->find($id);
        $courseEnrolled = \Auth::user()->courses()->where('course_user.is_currently_enrolled', 1)->first();
        if ($courseEnrolled->id != $id) {
            return view('trainee.courses.show', ['course' => $course]);
        }
        $subjectsFinished = \Auth::user()->subjects()
                                ->where('subject_user.course_id', $courseEnrolled->id)
                                ->where('subject_user.status', 1)->count();
        $subjectsNotFinished = \Auth::user()->subjects()
                                    ->where('subject_user.course_id', $courseEnrolled->id)
                                    ->where('subject_user.status', 0)->count();
        $courseProgress = ($subjectsFinished/($subjectsFinished + $subjectsNotFinished)) * 100;        
        return view('trainee.courses.show', ['course' => $course, 'courseProgress' => $courseProgress]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
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
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
