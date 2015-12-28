@extends('layouts.app')
@section('content')
<div class="container">
    <div class="jumbotron">
        <center>
            <h1>Training Management System</h1>
            <p>TMS_42</p>
        </center>
    </div>
    <div>
        <h4> Your Name {{ Auth::user()->name }} </h4>
        <h4> Your Name {{ Auth::user()->email }} </h4>
        <h4> {{ Auth::user()->avatar }} </h4>
    </div>
</div>
@endsection
