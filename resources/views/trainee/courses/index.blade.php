@extends('layouts.trainee')
@section('content')
<div class="container">
    <div class="row">
        <h1 class='text-warning'>Course List</h1>  
        <table class="table table-hover table-bordered table-striped"> 
            <thead>
                <tr>
                    <th class="col-md-3">Course No.</th>
                    <th class="col-md-9">Name</th>
                </tr>
            </thead>
            @foreach ($courses as $course)
                <tbody>
                    <tr>
                        <td class="span3">{!! $course->id !!}</td>
                        <td class="span9">{!! link_to_route('trainee.courses.show', $course->name, [$course->id]) !!}</td>   
                    </tr>
                </tbody>
            @endforeach
        </table>
    </div>
</div>
<center>
    {!! $courses->render() !!}
</center>
@endsection
