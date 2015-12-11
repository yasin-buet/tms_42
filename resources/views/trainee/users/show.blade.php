@extends('layouts.trainee')
@section('content')
<div id="div-indent">
    Name: {{ $member->name }}<br>
    Email: {{ $member->email }}
</div>
@endsection