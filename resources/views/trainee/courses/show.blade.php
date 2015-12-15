@extends('layouts.trainee')
@section('content')
<div class="container">
    <div id="row">
        <h1 class="text-primary"><strong>Course Details</strong> </h1>
        <div class="panel panel-primary">
            <div class="panel-heading">Course Name</div>
            <div class="panel-body text-primary">{!! $course->name !!}</div>
        </div>
        <div class="panel panel-success">
            <div class="panel-heading">Description</div>
            <div class="panel-body text-success">{!! $course->description !!}</div>
        </div>
        <div class="panel panel-warning">
            <div class="panel-heading">Status</div>
            <div class="panel-body text-warning">
                @if ($course->is_finished)
                    finished.
                @else 
                    up and going!
                @endif
            </div>
        </div>
        <div class="panel panel-danger">
            <div class="panel-heading">Start date</div>
            <div class="panel-body text-danger">{!! $course->start_date !!}</div>
        </div>
        <div class="panel panel-info">
            <div class="panel-heading">End date</div>
            <div class="panel-body text-info">{!! $course->end_date !!}</div>
        </div>
         <div class="panel panel-success">
            <div class="panel-heading">Subjects Under This Course</div>
            <div class="panel-body text-success">
                <ul class="list-group">
                    @foreach ($course->subjects as $subject)
                        <li class="list-group-item"> {!! $subject->name !!}</li>
                    @endforeach
                </ul>   
            </div>
        </div>
        @if (!empty($courseProgress))
            <div class="panel panel-success">
                <div class="panel-heading"><h3>You are enrolled to this course !! Your Current Progress</h3></div>
                <div class="panel-body text-success">
                    <div class="progress">
                        <div class="progress-bar progress-bar-success" role="progressbar" aria-valuenow="40" aria-valuemin="0" aria-valuemax="100" style="width:{{ $courseProgress }}%">Course Progress({{ $courseProgress }} % )
                        </div>
                    </div>
                    <h4>Course Start Date : {{ $course->start_date }}</h4>
                    <h4>Course End date : {{ $course->end_date }}</h4>
                </div>
            </div>
        @endif
    </div>
</div>
@endsection