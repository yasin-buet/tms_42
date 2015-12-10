@extends('layouts.app')
@section('content')
<div id="register" class="container">
    <div class="col-sm-offset-2 col-sm-8">
        <div class="panel panel-default">
            <div class="panel-heading">
                Create a new trainee
            </div>
            <div class="panel-body">
                @include('common.errors')
                {!! Form::open(['action' => 'Supervisor\UsersController@store'], ['class' => 'form-horizontal']) !!}
                    <div class="form-group">
                        {!! Form::label('name', 'Name', ['class' => 'col-sm-3 control-label']) !!}
                        {!! Form::text('name') !!}
                    </div>
                    <div class="form-group">
                        {!! Form::label('email', 'Email', ['class' => 'col-sm-3 control-label']) !!}
                        {!! Form::email('email') !!}
                    </div>
                    <div class="form-group">
                        <div class="col-sm-offset-3 col-sm-6">
                            {!! Form::submit('Create') !!}
                        </div>
                    </div>
                {!! Form::close() !!}
            </div>
        </div>
    </div>
</div>
@endsection
