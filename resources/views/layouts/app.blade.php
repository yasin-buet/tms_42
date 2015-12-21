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
                            </ul> 
                            <ul class="nav navbar-nav navbar-right">
                                <li><a href="/auth/register">{!! trans('messages.register') !!}</a></li>
                                <li><a href="/auth/login">{!! trans('messages.login') !!}</a></li>
                                <li>{!! link_to('/language/bn', 'বাংলা', array('class' => 'btn btn-warning')) !!}</li>
                                <li>{!! link_to('/language/en', 'English', array('class' => 'btn btn-info')) !!}</li>
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
    <div class="footer" id="footer">
        <div class="navbar-inner">
            <div class="container text-center">
                <hr>
                <div class="row">
                    <div class="col-lg-12">
                        <ul class="nav nav-pills nav-justified">
                            <li><a href="/">© 2015 PHP Team Ambidextrous.</a></li>
                            <li><a href="#">About Us</a></li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </div>
</body>
</html>
