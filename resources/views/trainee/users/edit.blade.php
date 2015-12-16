@extends('layouts.trainee')
@section('content')
<h2>Edit Your Profile - {{ $user->name }}</h2>
    <p class="lead">Edit profile informations below. 
    </p>
    {!! Form::model($user, [
        'method' => 'PATCH',
        'route' => ['trainee.users.update', $user->id]]) 
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
@endsection