@extends('layouts.supervisor')
@section('content')
<div class="col-xs-10">
    <table class="table table-striped">
        <thead>
            <tr>
                <th>ID</th>
                <th>Subject Name</th>
                <th>Actions</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($subjects as $subject)
                <tr>
                    <td>{{ $subject->id }}
                    </td>
                    <td>
                        <strong>{!! link_to_route('supervisor.subjects.show', $subject->name, [$subject->id]) !!}</strong>
                    </td>
                    <td>
                        {!! link_to_route('supervisor.subjects.edit', 'Edit', [$subject->id]) !!}
                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>
</div>
<center>
{!! $subjects->render() !!}
</center>
@endsection
