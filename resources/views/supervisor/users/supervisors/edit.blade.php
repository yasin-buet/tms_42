@extends('layouts.supervisor')
@section('content')
<div class="form-group">
    <h1>Edit Your Profile - {{ $supervisor->name }}</h1>
    <p class="lead">
        Edit profile informations below. 
    </p>
    {!! Form::model($supervisor, [
        'method' => 'PATCH',
        'route' => ['supervisor.users.update', $supervisor->id]]) 
    !!}
        <div class="form-group">
            {!! Form::label('name', 'Name:', ['class' => 'control-label']) !!}
            {!! Form::text('name', null, ['class' => 'form-control']) !!}
        </div>
        <div class="form-group">
            {!! Form::label('email', 'E-Mail:', ['class' => 'control-label']) !!}
            {!! Form::email('email', null, ['class' => 'form-control']) !!}
        </div>    
        <div>
            {!! Form::submit('Update Profile', ['class' => 'btn btn-primary']) !!}
        </div>
    {!! Form::close() !!}
</div>
@endsection