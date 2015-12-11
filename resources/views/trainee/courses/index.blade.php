@extends('layouts.trainee')
@section('content')
<div id="div-indent">
    <h1>Course List </h1>
    @foreach ($courses as $course)
        <h1><span class="label label-default">{!! link_to_route('trainee.courses.show', $course->name, [$course->id]) !!}</span></h1>
    @endforeach
</div>
<center>
    {!! $courses->render() !!}
</center>
@endsection