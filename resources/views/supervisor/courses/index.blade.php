@extends('layouts.supervisor')
@section('content')
<div id="div-indent">
    <h1>Course List </h1>
    @foreach ($courses as $course)
        <h1><span class="label label-default">{!! link_to_route('supervisor.courses.show', $course->name, [$course->id]) !!}</span></h1>
        {!! link_to_route('supervisor.courses.edit', 'Edit This Course', [$course->id]) !!}
        {!! link_to_route('supervisor.course.users.index', 'Edit Trainees', [$course->id]) !!} 
        {!! Form::open(['route' => ['supervisor.courses.destroy', $course->id], 'method' => 'DELETE']) !!}
            {!! Form::submit('Delete This Course') !!}
        {!! Form::close() !!}
    @endforeach
</div>
<center>
    {!! $courses->render() !!}
</center>
@endsection