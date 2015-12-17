@extends('layouts.supervisor')
@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-8 col-md-offset-2">
            <div class="panel panel-primary">
                <div class="panel-body">
                    <ul class="chat">
                        @foreach ($courses as $course)
                            <li class="list-group">
                                <div class="panel">
                                    <div class="header">
                                        <strong class="primary-font"><h1>{!! link_to_route('supervisor.courses.show', $course->name, [$course->id]) !!}</h1></strong>
                                    </div>
                                    <p>
                                        {!! link_to_route('supervisor.courses.edit', 'Edit This Course', [$course->id], ['class' => 'btn btn-success']) !!}
                                    </p>
                                    <p>
                                        {!! link_to_route('supervisor.course.users.index', 'Edit Trainees', [$course->id], ['class' => 'btn btn-primary']) !!} 
                                    </p>
                                    <p>
                                        {!! Form::open(['route' => ['supervisor.courses.destroy', $course->id], 'method' => 'DELETE']) !!}
                                            {!! Form::submit('Delete This Course', ['class' => 'btn btn-large btn-danger openbutton']) !!}
                                        {!! Form::close() !!}
                                    </p>
                                </div>
                            </li>
                        @endforeach
                    </ul>
                </div>
            </div>
        </div>
    </div>
</div>
<center>
    {!! $courses->render() !!}
</center>
@endsection