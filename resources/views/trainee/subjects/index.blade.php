@extends('layouts.trainee')
@section('content')
<div id="div-indent">
    @foreach ($subjects as $subject)
        <h1>{{ $subject->name }}</h1><br>
        @foreach($subject->tasks as $task)
            <strong>{!! $task->name !!}:</strong>
            {!! $task->description !!}<br>
        @endforeach
        <br>
    @endforeach
</div>
@endsection