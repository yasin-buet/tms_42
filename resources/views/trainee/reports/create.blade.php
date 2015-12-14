@extends('layouts.trainee')
@section('content')
<div id="register" class="container">
    <div class="col-sm-offset-2 col-sm-8">
        <div class="panel panel-default">
            <div class="panel-heading">
                <h2>Create Report</h2>
            </div>
            <div class="panel-body">
                @include('common.errors')
                {!! Form::open(['action' => 'Trainee\ReportsController@store'], ['class' => 'form-group']) !!}
                    <div class="form-group">
                        {!! Form::label('startTime', 'Start Time', ['class' => 'col-sm-3 control-label']) !!}
                        {!! Form::time('start_time') !!}
                    </div>
                    <div class="form-group">
                        {!! Form::label('endTime', 'End Time', ['class' => 'col-sm-3 control-label']) !!}
                        {!! Form::time('end_time') !!}
                    </div>
                    <div class="form-group">
                        {!! Form::label('achievement', 'Achievement', ['class' => 'col-sm-3 control-label']) !!}
                        {!! Form::textarea('achievement') !!}
                    </div>
                    <div class="form-group">
                        {!! Form::label('next_day_plan', 'Next Day Plan', ['class' => 'col-sm-3 control-label']) !!}
                        {!! Form::textarea('next_day_plan') !!}
                    </div>
                    <div class="form-group">
                        {!! Form::label('comment', 'Comment', ['class' => 'col-sm-3 control-label']) !!}
                        {!! Form::textarea('comment') !!}
                    </div>
                    <div class="form-group">
                        <div class="col-sm-offset-3 col-sm-6">
                            {!! Form::submit('Submit') !!}
                        </div>
                    </div>
                {!! Form::close() !!}
            </div>
        </div>
    </div>
</div>
@endsection
