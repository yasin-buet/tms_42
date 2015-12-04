@extends('layouts.supervisor')
@section('content')
<div id="div-indent">
    <h3>Name :{{ $supervisor->name }} </h3>
    <h4>Email :{{ $supervisor->email }} </h4>
        <table class="table table-inverse">
            <thead>
                <tr>
                    <th>Course Name</th>
                    <th>Action</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($supervisor->courses as $course)
                    <tr>
                        <td>{{ $course->name }}</td>
                        <td>{!! link_to_route('supervisor.courses.show', 'view course', [$course->id]) !!}</td>
                    </tr>
                @endforeach
            </tbody>
        </table>
</div>
@endsection