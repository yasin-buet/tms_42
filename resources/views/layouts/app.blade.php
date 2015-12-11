<html>
<head>
    <title>tms_42</title>
    {!! Html::style('css/stylesheet.css') !!}
    {!! Html::style('css/bootstrap.min.css') !!}
    {!! HTML::script('js/jquery.min.js') !!}
    {!! HTML::script('js/bootstrap.min.js') !!}
</head>
<body>
    <div class="row">
        <div class="col-xs-12">
            <nav class="navbar navbar-inverse">
                <ul><a class="navbar-brand" href="/home"><img src="/img/logo.png"></a></ul>
                <a class="navbar-brand" href="/home">tms_42</a>
                @yield('menu_left')
                <div>
                    <ul class="nav navbar-nav navbar-right">
                        @if (Auth::guest())
                            <li><a href="/auth/register"><i class="fa fa-btn fa-heart"></i>Register</a></li>
                            <li><a href="/auth/login"><i class="fa fa-btn fa-sign-in"></i>Login</a></li>
                        @endif
                    </ul>
                </div>
            </nav>
        </div>
    </div>
    @yield('content')
</body>
</html>
