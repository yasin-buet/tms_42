<!DOCTYPE html>
<html lang="en-US">
    <head>
        <meta charset="utf-8">
    </head>
    <body>
        <h2>Comfirmation of Your Email Address</h2>
        <div>
            Thanks for creating an account with tms_42.
             <div class="form-group">
                {!! Form::label('name', 'Name: ', ['class' => 'col-sm-3 control-label']) !!}
                {!! $user->name !!}
            </div>
            <div class="form-group">
                {!! Form::label('email', 'Email: ', ['class' => 'col-sm-3 control-label']) !!}
                {!! $user->email !!}
            </div>
            <div class="form-group">
                {!! Form::label('password', 'Password: ', ['class' => 'col-sm-3 control-label']) !!}
                {!! $plainPassword !!}
            </div>
        </div>
    </body>
</html>
