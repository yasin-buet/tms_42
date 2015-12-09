@extends('layouts.supervisor')
@section('content')
<h1>Edit Course - {{ $course->name }}</h1>
    <p class="lead">Edit this course below. 
        <a href="{{ route('supervisor.courses.index') }}">Go back to all courses.</a>
    </p>
    {!! Form::model($course, [
        'method' => 'PATCH',
        'route' => ['supervisor.courses.update', $course->id]]) 
    !!}
    <div class="form-group">
        {!! Form::label('name', 'Title:', ['class' => 'control-label']) !!}
        {!! Form::text('name', null, ['class' => 'form-control']) !!}
    </div>
    <div class="form-group">
        {!! Form::label('description', 'Description:', ['class' => 'control-label']) !!}
        {!! Form::textarea('description', null, ['class' => 'form-control']) !!}
    </div>
    <div>
        {!! Form::label('supervisor_id', 'Select A Supervisor:', ['class' => 'control-label']) !!}
        {!! Form::select('supervisor_id', $supervisors) !!}
    </div>
    <div>
        {!! Form::submit('Update Course', ['class' => 'btn btn-primary']) !!}
    </div>
    {!! Form::close() !!}
@endsection