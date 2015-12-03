@extends('layouts.supervisor')
@section('content')
<center>
<h1>
{{ $subject->name }}
</h1>
</center>
<div>
    <table class="table table-striped">
        <thead>
            <tr>
                <th>Task Name</th>
                <th>Description</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($subject->tasks as $task)
                <tr>
                    <td>
                        {{ $task->name }}
                    </td>
                    <td>
                        {{ $task->description }}
                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>
    {!! link_to_route('supervisor.subjects.tasks.create', 'add task', [$subject->id]) !!}
</div>
@endsection