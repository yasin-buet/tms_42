<?php

namespace App\Http\Controllers\Supervisor;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;
use App\Repositories\SubjectRepository;
use App\Repositories\CourseSubjectRepository;

class SubjectsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    protected $subjects;
    protected $courseSubjectRepository;
    public function __construct(SubjectRepository $subjects, CourseSubjectRepository $courseSubjectRepository)
    {
        $this->middleware('supervisor');
        $this->subjects = $subjects;
        $this->courseSubjectRepository = $courseSubjectRepository;
    }
    public function index()
    {
        $subjects = $this->subjects->allSubjectsWithPaginate();
        return view('supervisor.subjects.index', compact('subjects'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('supervisor.subjects.create');
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
        $subjectId = $this->subjects->createSubject($input);
        return redirect()->action('Supervisor\SubjectsController@show', ['subjectId' => $subjectId]);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $subject = $this->subjects->subjectWithTasks($id);
        return view('supervisor.subjects.show', compact('subject'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $subject = $this->subjects->findSubject($id);
        return view('supervisor.subjects.edit', ['subject' => $subject]);
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
        $this->courseSubjectRepository->updateByCourseIdAndSubjectId($id, $request->course_id, ['is_finished' => 1, 'end_date' => date('Y-m-d H:i:s')]);
        $subject = $this->subjects->findSubject($id);
        $this->validate($request, [
            'name' => 'required',
            'description' => 'required',
        ]);
        $input = $request->all();
        $subject->update($input);
        return back();
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
