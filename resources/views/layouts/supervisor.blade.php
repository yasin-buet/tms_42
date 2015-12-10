@extends('layouts.app')
@section('menu_left')
<ul id="nav-color" class="nav navbar-nav">
    <li class="dropdown"><a class="dropdown-toggle" data-toggle="dropdown" href="#">Course <span class="caret"></span></a>
        <ul class="dropdown-menu">
            <li>{!! Html::link('/supervisor/courses', 'View All') !!}
            </li>
            <li>{!! HTML::link('/supervisor/courses/create', 'Add Course') !!}
            </li>
        </ul>
    </li>
    <li class="dropdown"><a class="dropdown-toggle" data-toggle="dropdown" href="#">Subject <span class="caret"></span></a>
        <ul class="dropdown-menu">
            <li>{!! HTML::link('/supervisor/subjects', 'View All') !!}
            </li>
            <li>{!! HTML::linkAction('Supervisor\SubjectsController@create', 'Add Subject') !!}
            </li>
        </ul>
    </li>
    <li class="dropdown"><a class="dropdown-toggle" data-toggle="dropdown" href="#">trainee <span class="caret"></span></a>
        <ul class="dropdown-menu">
            <li>{!! HTML::linkAction('Supervisor\UsersController@index', 'View All', ['type' => 'trainee']) !!}
            </li>
            <li>{!! HTML::link('#', 'Add trainee To Course') !!}
            </li>
        </ul>
    </li>
    <li  class="dropdown"><a class="dropdown-toggle" data-toggle="dropdown" href="#">Supervisor <span class="caret"></span></a>
        <ul class="dropdown-menu">
            <li>{!! HTML::linkAction('Supervisor\UsersController@index', 'View All', ['type' => 'supervisor']) !!}
            </li>
        </ul>
    </li>
    <li id="profile-right" class="dropdown"><a class="dropdown-toggle" data-toggle="dropdown" href="#">{{ Auth::user()->name }}<span class="caret"></span></a>
        <ul class="dropdown-menu">
            <li>{!! HTML::linkAction('Supervisor\UsersController@edit', 'Update', ['supervisorId' => \Auth::user()->id]) !!}
            </li>
            <li>{!! HTML::link('auth/logout', 'Logout') !!}
            </li>
        </ul>
    </li>
</ul>
@endsection