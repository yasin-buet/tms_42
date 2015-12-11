@extends('layouts.trainee')
@section('content')
<div id="div-indent">
    <table class="table table-bordered">
        <thead>
            <tr>
                <th>Name</th>
                <th>Action</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($members as $member)
                <tr>
                    <td>{{ $member->name }}</td>
                    <td>
                        {!! Html::linkAction('Trainee\UsersController@show', 'View', ['memberId' => $member->id]) !!}
                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>
</div>
@endsection