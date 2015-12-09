@extends('layouts.app')
@section('menu_left')
<ul class="nav navbar-nav">
    <li class="dropdown"><a class="dropdown-toggle" data-toggle="dropdown" href="#">Course <span class="caret"></span></a>
        <ul class="dropdown-menu">
            <li>{!! Html::link('#', 'Course Details') !!}
            </li>
            <li>{!! HTML::link('#', 'Course Members') !!}
            </li>
        </ul>
    </li>
    <li>{!! HTML::link('#', 'Calender') !!}
    </li>
    <li>{!! HTML::link('#', 'Report') !!}
    </li>
    <li>{!! HTML::link('#', 'Progress') !!}
    </li>
    <li>{!! HTML::link('#', 'History') !!}
    </li>
    <ul class="nav navbar-nav navbar-right">
        <li id="profile-right" class="dropdown"><a class="dropdown-toggle" data-toggle="dropdown" href="#">{{ Auth::user()->name }}<span class="caret"></span></a>
            <ul class="dropdown-menu">
                <li>{!! HTML::linkAction('Trainee\UsersController@edit', 'Update', ['traineeId' => \Auth::user()->id]) !!}
                </li>
                <li>{!! HTML::link('auth/logout', 'Logout') !!}
                </li>
            </ul>
        </li>
    </ul>
</ul>
@endsection