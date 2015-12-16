@extends('layouts.trainee')
@section('content')
<div class="container">
    <div class="row">
        <div class="span12">
            <p class="lead"> 
                You are currently enrolled in the course: {!! $courseOngoing->name !!} <br>
                Start Date: {!! $courseOngoing->start_date !!} <br>
            </p>
        </div> 
        <div class="span12">   
            <h3>Other member on the course: </h3>
            <table class="table table-bordered">
                <thead>
                    <tr>
                        <th>Name</th>
                        <th>Action</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($members as $member)
                        <tr>
                            <td>{{ $member->name }}</td>
                            <td>
                                {!! Html::linkAction('Trainee\UsersController@show', 'View', ['memberId' => $member->id]) !!}
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
        <div class="span12">
            <h3>Your Previous Courses: </h3>
            @foreach ($courseFinished as $course)
                <p class="lead"> 
                    name: {!! $course->name !!} <br>
                    Start Date: {!! $course->start_date !!} <br>
                    End Date: {!! $course->end_date !!} 
                </p>
            @endforeach
        </div>
    </div>
</div>
@endsection
