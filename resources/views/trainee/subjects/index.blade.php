@extends('layouts.trainee')
@section('content')
<div id="div-indent">
    @foreach ($subjects as $subject)
        <h1>{{ $subject->name }}</h1><br>
        @foreach($subject->tasks as $task)
            <strong>{!! $task->name !!}:</strong>
            {!! $task->description !!}<br>
        @endforeach
        <h2>Your Current Progress </h2>
        <div class="progress">
            <div class="progress-bar progress-bar-success" role="progressbar" aria-valuenow="40" aria-valuemin="0" aria-valuemax="100" style="width:{{ $subject->progress($course->id) }}%">Subject Progress({{ $subject->progress($course->id) }} % )
            </div>
        </div>
        <br>
        @if ($subject->pivot->status == 0)
            {!! Form::open(['route'=>['trainee.subjects.update', $subject->id], 'method' => 'PUT']) !!}
                {!! Form::submit('Finish Subject') !!}
            {!! Form:: close() !!}
        @endif
    @endforeach
</div>
@endsection