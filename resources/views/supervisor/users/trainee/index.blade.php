@extends('layouts.supervisor')
@section('content')
<div id="div-indent">
    <table class="table table-inverse">
        <thead>
            <tr>
                <th>Name</th>
                <th>Email</th>
                <th>Action</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($users as $user)
                <tr>
                    <td>{{ $user->name }}</td>
                    <td>{{ $user->email }}</td>
                    <td>
                        {!! link_to_route('supervisor.users.edit', 'edit', ['userId' => $user->id, 'type' => 'trainee']) !!}
                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>
</div>
@endsection
