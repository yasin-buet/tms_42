<?php

namespace App\Http\Controllers\Supervisor;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;
use App\Course;
use App\User;
use App\CourseUser;

class CourseUsersController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request, $id)
    {
        $course = Course::find($id);
        $enrolledIds = $course->users()->lists('user_id');
        $trainees = User:: whereIn('id', $enrolledIds)->orWhere('is_enrolled', 0)->trainee()->get();
        return view('supervisor.courses.users.show', compact('trainees', 'course'));
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
    public function store(Request $request, $courseId)
    {
        $course = Course::find($courseId);
        $traineeIds = $request->input('trainees');
        $currentTraineeIds = $course->users()->lists('user_id');
        $detachIds = array_diff( $currentTraineeIds->toArray(), $traineeIds);
        User::whereIn('id', $detachIds)->update(['is_enrolled' => 0]);
        User::whereIn('id', $traineeIds)->update(['is_enrolled' => 1]);
        $course->users()->attach($traineeIds, ['is_currently_enrolled' => 1]);
        $course->users()->detach($detachIds);
        return redirect('/home');
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
