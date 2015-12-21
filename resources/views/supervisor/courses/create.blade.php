@extends('layouts.supervisor')
@section('content')
<div id="register" class="container">
    <div class="col-sm-offset-2 col-sm-8">
        <div class="panel panel-default">
            <div class="panel-heading">
                <h2>Add a Course</h2>
            </div>
            <div class="panel-body">
                @include('common.errors')
                {!! Form::open(['action' => 'Supervisor\CoursesController@store'], ['class' => 'form-group']) !!}
                    <div class="form-group">
                        {!! Form::label('name', 'Name', ['class' => 'col-sm-3 control-label']) !!}
                        {!! Form::text('name') !!}
                    </div>
                    <div class="form-group">
                        {!! Form::label('details', 'Details', ['class' => 'col-sm-3 control-label']) !!}
                        {!! Form::textarea('description') !!}
                    </div>
                    <div class="form-group">
                        {!! Form::label('startDate', 'Start Date', ['class' => 'col-sm-3 control-label']) !!}
                        {!! Form::date('start_date', null, ['type' => 'text', 'class' => 'form-control datepicker', 'id' => 'calendar']) !!}
                    </div>
                    <div class="form-group">
                        {!! Form::label('endDate', 'End Date', ['class' => 'col-sm-3 control-label']) !!}
                        {!! Form::date('end_date', null, ['type' => 'text', 'class' => 'form-control datepicker', 'id' => 'calendar']) !!}

                    </div>
                    @foreach ($subjects as $subject)
                        <div>
                            {!! Form::checkbox('subjects[]', $subject->id) !!} 
                            {!! $subject->name !!}
                        </div>
                    @endforeach
                    <div class="form-group">
                        <div class="col-sm-offset-3 col-sm-6">
                            {!! Form::submit('Add', ['class' => 'btn btn-success center-block']) !!}
                        </div>
                    </div>
                {!! Form::close() !!}
            </div>
        </div>
    </div>
</div>
@endsection