@extends('layouts.app')
@section('content')
<div class="container">
    <div class="jumbotron">
        <center>
            <h1>Training Management System</h1>      
            <p>TMS_42</p>
            {!! Form::open(array('url' => '')) !!}
            {!! csrf_field() !!}
                  <script
                    src="https://checkout.stripe.com/checkout.js" class="stripe-button"
                    data-key="pk_test_gTDeUrDqKBXTbLb0rNSGZUCG"
                    data-amount="900"
                    data-name="TMS_42"
                    data-description="2 widgets ($20.00)"
                    data-image="/128x128.png"
                    data-locale="auto">
                  </script>
            {!! Form::close() !!}
        </center>
    </div>      
</div>
@endsection
