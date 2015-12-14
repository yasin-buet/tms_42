@extends('layouts.app')
@section('menu_left')
<ul class="nav navbar-nav">
    <li class="dropdown"><a class="dropdown-toggle" data-toggle="dropdown" href="#">Course <span class="caret"></span></a>
        <ul class="dropdown-menu">
            <li>{!! Html::link('/trainee/courses', 'View All') !!}
            </li>
            <li>{!! HTML::linkAction('Trainee\UsersController@index', 'Course Members') !!}
            </li>
        </ul>
    </li>
    <li class="dropdown"><a class="dropdown-toggle" data-toggle="dropdown" href="#">Subject <span class="caret"></span></a>
        <ul class="dropdown-menu">
            <li>{!! HTML::linkAction('Trainee\SubjectsController@index', 'View My Subjects') !!}
            </li>
        </ul>
    </li>
    <li>{!! HTML::link('#', 'Calender') !!}
    </li>
    <li class="dropdown"><a class="dropdown-toggle" data-toggle="dropdown" href="#">Report <span class="caret"></span></a>
        <ul class="dropdown-menu">
            <li>
                {!! HTML::linkAction('Trainee\ReportsController@create', 'Write todays report') !!}
            </li>
            <li>
                {!! HTML::link('#', 'View all') !!}
            </li>
        </ul>
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