@extends('layouts.supervisor')
@section('content')
<div id="div-indent">
    <h1 id="course-detail-color"><strong>Course Details</strong> </h1>
        <h2 id="course-color">Course Name :{{ $course->name }}</h2>
        <h2 id="course-description">Description: {{ $course->description }}</h2>
        <h2 id="status-color">Status :
        @if ($course->is_finished)
            finished.
        @else 
        up and going!
        @endif
        </h2>
        <h2 id="start-date">Start date:{{ $course->start_date }}</h2>
        <h2 id="end-date">End date:{{ $course->end_date }}</h2>
        <h2 id="sujects-of-course">Subjects Under This Course</h2>
        @foreach ($course->subjects as $subject)
            <h1><span class="label label-default">{!! link_to_route('supervisor.subjects.show', $subject->name, [$subject->id]) !!}</span></h1>
        @endforeach
</div>
@endsection