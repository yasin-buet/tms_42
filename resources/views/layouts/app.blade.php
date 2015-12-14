<html>
<head>
    <title>tms_42</title>
    {!! Html::style('css/stylesheet.css') !!}
    {!! Html::style('css/bootstrap.min.css') !!}
    {!! HTML::script('js/jquery.min.js') !!}
    {!! HTML::script('js/bootstrap.min.js') !!}
</head>
<body>
    <div class="container">
        <div class="row">
            @if (Auth::guest())
                <nav class="navbar navbar-default">
                    <div class="container-fluid">
                        <div class="navbar-header">
                            <a class="pull-left" href="#"><img src="/img/logo.png"></a>
                        </div>
                        <div class="collapse navbar-collapse">
                            <ul class="nav navbar-nav">
                                <li class="active"><a href="#">tms_42</a></li>
                            </ul> 
                            <ul class="nav navbar-nav navbar-right">
                                <li><a href="/auth/register">Register</a></li>
                                <li><a href="/auth/login">Login</a></li>
                            </ul>
                        </div>
                    </div>
                </nav>
            @endif
        </div>
        @yield('menu')
        <div class="row centered" id="content">
            @yield('content')
        </div>
    </div> 
</body>
</html>
