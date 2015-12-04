<html>
<head>
    <title>tms_42</title>
    <link rel="stylesheet" href="http://maxcdn.bootstrapcdn.com/bootstrap/3.3.5/css/bootstrap.min.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.3/jquery.min.js"></script>
    <script src="http://maxcdn.bootstrapcdn.com/bootstrap/3.3.5/js/bootstrap.min.js"></script>
    {!! Html::style('css/stylesheet.css') !!}
</head>
<body>
    <div class="row">
        <div class="col-xs-12">
            <nav class="navbar navbar-inverse">
                <ul><a class="navbar-brand" href="#"><img src="/img/logo.png"></a></ul>
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
