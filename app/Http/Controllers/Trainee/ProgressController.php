<?php

namespace App\Http\Controllers\Trainee;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;
use App\User;
use App\Course;
use App\Subject;
use App\Task;
use App\CourseUser;

class ProgressController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $id = \Auth::user()->id;
        $course = CourseUser::whereUserId($id)->whereIsCurrentlyEnrolled(1)->first()->course_id;
        // echo $course.'<br>';
        $tasksFinished = \Auth::user()->tasks()->where('task_user.status', 1)->count();
        $tasksNotFinished = \Auth::user()->tasks()->where('task_user.status', 0)->count();
        $courseProgress = ($tasksFinished/($tasksFinished+$tasksNotFinished))*100;
        // echo $courseProgress.'</br>';

        $subjectsFinished = \Auth::user()->subjects()->where('subject_user.status', 1)->count();
        $subjectsNotFinished = \Auth::user()->subjects()->where('subject_user.status', 0)->count();
        // $courseProgress = ($subjectsFinished/($subjectsFinished+$subjectsNotFinished))*100;


        // echo $courseProgress.'</br>';

        // foreach ($tasks as $task) {
            // echo $task->status;
        // }

        // echo $tasksFinished.'<br>';
        // echo $tasksNotFinished.'<br>';
        return view('trainee.progress.index', ['courseProgress' => $courseProgress]);

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
        //
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
