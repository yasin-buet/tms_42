@extends('layouts.supervisor')
@section('content')
<center>
<h1>{{ $course->name }}</h1>
</center>
<div>
{!! Form::open(['route' => ['supervisor.course.users.store', $course->id], 'method' => 'POST']) !!}
    @foreach ($trainees as $trainee)
        {!! $trainee->name !!}
        {!! Form::checkbox('trainees[]', $trainee->id, $trainee->is_enrolled) !!}<br> 
    @endforeach
    {!! Form::submit('Add to course') !!}
{!! Form::close() !!}
</div>
@endsection