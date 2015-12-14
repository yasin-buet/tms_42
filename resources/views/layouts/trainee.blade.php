@extends('layouts.app')
@section('menu')
<nav class="navbar navbar-default">
    <div class="container-fluid">
        <div class="navbar-header">
            <a class="pull-left" href="#"><img src="/img/logo.png"></a>
        </div>
        <div>
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
                <li>{!! HTML::linkAction('Trainee\UsersController@index', 'History') !!}
                </li>
            </ul>
            <ul class="nav navbar-nav navbar-right">
                <li class="dropdown">
                    <a href="#" class="dropdown-toggle" data-toggle="dropdown">{{ Auth::user()->name }} <b class="caret"></b></a>
                    <ul class="dropdown-menu">
                        <li>{!! HTML::linkAction('Trainee\UsersController@edit', 'Update', ['traineeId' => \Auth::user()->id]) !!}
                        </li>
                        <li>{!! HTML::link('auth/logout', 'Logout') !!}
                        </li>
                    </ul>
                </li>
            </ul>
        </div>
    </div>
</nav>
@endsection