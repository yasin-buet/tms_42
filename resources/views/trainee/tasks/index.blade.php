@extends('layouts.trainee')
@section('content')
<div class="container">
    <div class="row">
        <div class="col-xs-6">
            <div class="panel panel-success">
                <div class="panel-heading">Finished Tasks
                </div>
                <div class="panel-body">
                    <table class = "table">
                        <tr>
                            <th>task</th>
                            <th>Subject </th>
                        </tr>
                        @foreach ($finishedTasks as $task)
                            <tr>
                                <td>{!! $task->name !!}</td>
                                <td>{!! $task->subject->name !!}</td>
                            </tr>
                        @endforeach
                    </table>
                </div>
            </div>
        </div>
        <div class="col-xs-6">
            <div class="panel panel-danger">
                <div class="panel-Heading">Unfinished Tasks
                </div>
                <div class="panel-body">
                    <table class = "table">
                        <tr>
                            <th>task</th>
                            <th>Subject </th>
                        </tr>
                        @foreach ($unfinishedTasks as $task)
                            <tr>
                                <td>{!! $task->name !!}</td>
                                <td>{!! $task->subject->name !!}</td>
                            </tr>
                        @endforeach
                    </table>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
