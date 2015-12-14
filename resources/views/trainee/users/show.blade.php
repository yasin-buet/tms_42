@extends('layouts.trainee')
@section('content')
<div id="div-indent">
    Name: {{ $user->name }}<br>
    Email: {{ $user->email }}
</div>
@endsection