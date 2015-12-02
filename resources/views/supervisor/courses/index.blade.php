@extends('layouts.supervisor')
@section('content')
<div id="div-indent">
    @foreach ($courses as $course)
        <br><br><h1>Course Name: <span class="label label-default">{{ $course->name }}</span></h1>
    @endforeach
</div>
<center>
    {!! $courses->render() !!}
</center>
@endsection