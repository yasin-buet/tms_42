@extends('layouts.supervisor')
@section('content')
<div class="container">
    <div class="jumbotron">
        <h1>Welcome to FTS !</h1>
        <p>Build a nice, great system !!</p> 
    </div>
    <div class="row">
        <div class="col-sm-6">
            <h3>Course</h3>
            <p>You can View, edit and add course here.</p>
            <p>
                <div class="col-sm-4">
                    {!! Html::linkAction('Supervisor\CoursesController@create', 'Add', [], ['class' => 'btn btn-primary']) !!}
                </div>
                <div class="col-sm-4">
                    {!! Html::linkAction('Supervisor\CoursesController@index', 'View', [], ['class' => 'btn btn-info']) !!}
                </div>
            </p>
        </div>
        <div class="col-sm-6">
            <h3>Subject</h3>
            <p>You can View, edit and add subject here.</p>
            <p>
                <div class="col-sm-4">
                    {!! Html::linkAction('Supervisor\SubjectsController@create', 'Add', [], ['class' => 'btn btn-warning']) !!}
                </div>
                <div class="col-sm-4">
                    {!! Html::linkAction('Supervisor\SubjectsController@index', 'View', [], ['class' => 'btn btn-danger']) !!}
                </div>
            </p>
        </div>
    </div>
</div>
@endsection