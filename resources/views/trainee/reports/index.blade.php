@extends('layouts.trainee')
@section('content')
@foreach ($reports as $report)
    <div class="container">
        <div class="row">
            <div class="col-xs-10">
                <div class="panel panel-primary">
                    <div class="panel-heading">
                        <h2 class="panel-title">
                            Daily Report for: {!! date_format(new DateTime($report->start_time), 'd-m-Y') !!}
                        </h2>
                    </div>
                    <div class="panel-body">
                        <table class="table table-bordered">
                            <tbody>
                                <tr>
                                    <td>Start Time</td>
                                    <td>{!! date('H:i:s', strtotime($report->start_time)) !!}</td>
                                </tr>
                                <tr>
                                    <td>End Time</td>
                                    <td>{!! date('H:i:s', strtotime($report->end_time)) !!}</td>
                                </tr>
                                <tr>
                                    <td>Achievement</td>
                                    <td>{!! $report->achievement !!}</td>
                                </tr>
                                <tr>
                                    <td>Next Day Plan</td>
                                    <td>{!! $report->next_day_plan !!}</td>
                                </tr>
                                <tr>
                                    <td>Comment</td>
                                    <td>{!! $report->comment !!}</td>
                                </tr>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endforeach
@endsection
