@extends('layouts.app')
@section('menu')
<nav class="navbar navbar-default">
    <div class="container-fluid">
        <div class="navbar-header">
            <a class="pull-left" href="#"><img src="/img/logo.png"></a>
        </div>
        <div>
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
                        <li>{!! HTML::link('/supervisor/users/create', 'Create trainee') !!}
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
            </ul>
            <ul class="nav navbar-nav navbar-right">
                <li class="dropdown">
                    <a href="#" class="dropdown-toggle" data-toggle="dropdown">{{ Auth::user()->name }} <b class="caret"></b></a>
                    <ul class="dropdown-menu">
                        <li>{!! HTML::linkAction('Supervisor\UsersController@edit', trans('messages.update'), ['supervisorId' => \Auth::user()->id]) !!}
                        </li>
                        <li>{!! HTML::link('auth/logout', trans('messages.logout')) !!}
                        </li>
                    </ul>
                </li>
            </ul> 
        </div>
    </div>
</nav>
@endsection