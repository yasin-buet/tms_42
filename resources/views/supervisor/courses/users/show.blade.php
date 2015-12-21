@extends('layouts.supervisor')
@section('content')
<center>
<h1>{{ $course->name }}</h1>
</center>
<div>
{!! Form::open(['route' => ['supervisor.course.users.store', $course->id], 'method' => 'POST']) !!}
    <div class="container">
        <ul class="list-group">
            @foreach ($trainees as $trainee)
                <li class="list-group-item">
                    <div class="row">
                        <div class="col-md-3">
                            {!! Form::checkbox('trainees[]', $trainee->id, $trainee->is_enrolled) !!}
                        </div>
                        <div class="col-md-9">
                            {!! $trainee->name !!}
                        </div>
                    </div>
                </li>
            @endforeach
        </ul>
    </div>
    {!! Form::submit('Add to course', ['class' => 'btn btn-success center-block']) !!}
{!! Form::close() !!}

@endsection