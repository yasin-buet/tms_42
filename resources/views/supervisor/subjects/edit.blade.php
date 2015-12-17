@extends('layouts.supervisor')
@section('content')
<h1>Edit Subject - {{ $subject->name }}</h1>
    <p class="lead">Edit this subject below. 
        <a href="{{ route('supervisor.subjects.index') }}">Go back to all subjects.</a>
    </p>
    {!! Form::model($subject, [
        'method' => 'PATCH',
        'route' => ['supervisor.subjects.update', $subject->id]]) 
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
            {!! Form::submit('Update Subject', ['class' => 'btn btn-primary']) !!}
        </div>
    {!! Form::close() !!}
@endsection