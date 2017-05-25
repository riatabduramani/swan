<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <title>Register - {{ config('app.name') }}</title>
    
    <link href="{{ asset('images/swan-logob.png') }}" rel="shortcut icon" type="image/png">
    <link href="{{ asset('css/front/animate.min.css') }}" rel="stylesheet" type="text/css">
    <link href="{{ asset('css/front/bootstrap.min.css') }}" rel="stylesheet" type="text/css">
    <link href="{{ asset('css/front/hover-min.css') }}" rel="stylesheet" type="text/css">
    <link href="{{ asset('css/front/font-awesome.min.css') }}" rel="stylesheet" type="text/css">
    <link href="{{ asset('css/front/icofont.css') }}" rel="stylesheet" type="text/css">
    <link href="{{ asset('css/front/meanmenu.css') }}" rel="stylesheet" type="text/css">
    <link href="{{ asset('css/front/owl.carousel.css') }}" rel="stylesheet" type="text/css">
    <link href="{{ asset('fonts/webfonts/fonts.css') }}" rel="stylesheet" type="text/css">
    <link href="{{ asset('css/style.css') }}" rel="stylesheet" type="text/css">
    <!-- HTML5 shim and Respond.js for IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
      <script src="https://oss.maxcdn.com/html5shiv/3.7.2/html5shiv.min.js"></script>
      <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
    <![endif]-->
</head>
<body>
    <div id="preloader">
        <div class="preloader_spinner"></div>
    </div>
    <div class="price_page">

    @include('frontend.header')

    <section class="romana_allPage_area">
            <div class="container">
                <div class="row">
                    <div class="col-xs-12">
                    </div>
                </div>
            </div>
    </section>
<!-- ==================================================
    LOGIN FORM
=================================================== -->
<div class="container" style="margin-top: 5%;padding-bottom: 5%;">

   <div class="row">
        <div class="col-md-8 col-md-offset-2">
            <div class="panel panel-default">
                <div class="panel-heading" style="color: #fff; background-color: #0a587f; border-color: #ddd;">Register</div>
                <div class="panel-body">
                    <form class="form-horizontal" role="form" method="POST" action="{{ route('register') }}">
                        {{ csrf_field() }}

                        <div class="form-group{{ $errors->has('name') ? ' has-error' : '' }}">
                            <label for="name" class="col-md-4 control-label">Name:</label>

                            <div class="col-md-6">
                                <input id="name" type="text" class="form-control" name="name" value="{{ old('name') }}" required autofocus>

                                @if ($errors->has('name'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('name') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>
                        <div class="form-group{{ $errors->has('surname') ? ' has-error' : '' }}">
                            <label for="surname" class="col-md-4 control-label">Surname:</label>

                            <div class="col-md-6">
                                <input id="surname" type="text" class="form-control" name="surname" value="{{ old('surname') }}" required autofocus>

                                @if ($errors->has('surname'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('surname') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>
                        <div class="form-group{{ $errors->has('email') ? ' has-error' : '' }}">
                            <label for="email" class="col-md-4 control-label">E-Mail Address:</label>

                            <div class="col-md-6">
                                <input id="email" type="email" class="form-control" name="email" value="{{ old('email') }}" required>

                                @if ($errors->has('email'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('email') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>

                        <div class="form-group{{ $errors->has('password') ? ' has-error' : '' }}">
                            <label for="password" class="col-md-4 control-label">Password:</label>

                            <div class="col-md-6">
                                <input id="password" type="password" class="form-control" name="password" required>

                                @if ($errors->has('password'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('password') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>

                        <div class="form-group">
                            <label for="password-confirm" class="col-md-4 control-label">Confirm Password:</label>

                            <div class="col-md-6">
                                <input id="password-confirm" type="password" class="form-control" name="password_confirmation" required>
                            </div>
                        </div>


                    <hr class="half-rule"/>
                    <div class="form-group">
                    <div class="col-md-6 pull-left">
                        <h4 style="color: #0a587f">Your address in Macedonia:</h4>    
                    </div>
                    </div>

                    <div class="form-group {{ $errors->has('address_in') ? 'has-error' : ''}}">
                    {!! Form::label('address_in', 'Address:', ['class' => 'col-md-4 control-label', 'required']) !!}
                        <div class="col-md-6">
                            {!! Form::textarea('address_in', null, ['class' => 'form-control', 'rows'=>'2']) !!}
                            {!! $errors->first('address_in', '<p class="help-block">:message</p>') !!}
                        </div>
                    </div>
                     <div class="form-group {{ $errors->has('district_in_id') ? 'has-error' : ''}}">
                    {!! Form::label('district_in_id', 'Place:', ['class' => 'col-md-4 control-label']) !!}
                        <div class="col-md-6">
                            {!! Form::select('district_in_id', $district, null, ['placeholder'=>'Select district/place...','class' => 'form-control','required']) !!}
                            {!! $errors->first('district_in_id', '<p class="help-block">:message</p>') !!}
                        </div>
                    </div>
                    <div class="form-group {{ $errors->has('city_in_id') ? 'has-error' : ''}}">
                    {!! Form::label('city_in_id', 'City:', ['class' => 'col-md-4 control-label', 'required']) !!}
                        <div class="col-md-6">
                            {!! Form::select('city_in_id',$city, null, ['class' => 'form-control', 'required']) !!}
                            {!! $errors->first('city_in_id', '<p class="help-block">:message</p>') !!}
                        </div>
                    </div>
                    <div class="form-group {{ $errors->has('country_in_id') ? 'has-error' : ''}}">
                    {!! Form::label('country_in_id', 'Country:', ['class' => 'col-md-4 control-label']) !!}
                        <div class="col-md-6">
                            {!! Form::select('country_in_id', $countrymk, null, ['class' => 'form-control', 'required']) !!}
                            {!! $errors->first('country_in_id', '<p class="help-block">:message</p>') !!}
                        </div>
                    </div>
                    <div class="form-group {{ $errors->has('phone_in') ? 'has-error' : ''}}">
                    {!! Form::label('phone_in', 'Phone:', ['class' => 'col-md-4 control-label', 'required']) !!}
                        <div class="col-md-6">
                            {!! Form::text('phone_in', null, ['class' => 'form-control', 'required']) !!}
                            {!! $errors->first('phone_in', '<p class="help-block">:message</p>') !!}
                        </div>
                    </div>


                    <hr class="half-rule"/>
                    <div class="form-group">
                    <div class="col-md-6 pull-left">
                        <h4 style="color: #0a587f">Your address outside Macedonia:</h4>    
                    </div>
                    </div>

                    <div class="form-group {{ $errors->has('address_out') ? 'has-error' : ''}}">
                        {!! Form::label('address_out', 'Address:', ['class' => 'col-md-4 control-label']) !!}
                        <div class="col-md-6">
                            {!! Form::textarea('address_out', null, ['class' => 'form-control','rows'=>'2', 'required']) !!}
                            {!! $errors->first('address_out', '<p class="help-block">:message</p>') !!}
                        </div>
                    </div>
                    <div class="form-group {{ $errors->has('postal_out') ? 'has-error' : ''}}">
                        {!! Form::label('postal_out', 'Postal:', ['class' => 'col-md-4 control-label']) !!}
                        <div class="col-md-6">
                            {!! Form::text('postal_out', null, ['class' => 'form-control', 'required']) !!}
                            {!! $errors->first('postal_out', '<p class="help-block">:message</p>') !!}
                        </div>
                    </div>
                    <div class="form-group {{ $errors->has('city_id') ? 'has-error' : ''}}">
                        {!! Form::label('city_id', 'City:', ['class' => 'col-md-4 control-label']) !!}
                        <div class="col-md-6">
                            {!! Form::text('city', null, ['class' => 'form-control', 'required']) !!}
                            {!! $errors->first('city', '<p class="help-block">:message</p>') !!}
                        </div>
                    </div>
                    <div class="form-group {{ $errors->has('country_id') ? 'has-error' : ''}}">
                        {!! Form::label('country_id', 'Country:', ['class' => 'col-md-4 control-label']) !!}
                        <div class="col-md-6">
                            {!! Form::select('country_id', $country, 208, ['class' => 'form-control', 'required']) !!}
                            {!! $errors->first('country_id', '<p class="help-block">:message</p>') !!}
                        </div>
                    </div>
                    <div class="form-group {{ $errors->has('phone_out') ? 'has-error' : ''}}">
                    {!! Form::label('phone_out', 'Phone:', ['class' => 'col-md-4 control-label', 'required']) !!}
                    <div class="col-md-6">
                        {!! Form::text('phone_out', null, ['class' => 'form-control', 'required']) !!}
                        {!! $errors->first('phone_out', '<p class="help-block">:message</p>') !!}
                    </div>
                    </div>

                    <hr class="half-rule"/>
                    <div class="form-group">
                    <div class="col-md-6 pull-left">
                        <h4 style="color: #0a587f">Emergency contact:</h4>
                    </div>
                    </div>

                     <div class="form-group {{ $errors->has('emergencycontact') ? 'has-error' : ''}}">
                        {!! Form::label('emergencycontact', 'Name & Last Name:', ['class' => 'col-md-4 control-label']) !!}
                        <div class="col-md-6">
                            {!! Form::text('emergencycontact', null, ['class' => 'form-control', 'required']) !!}
                            {!! $errors->first('emergencycontact', '<p class="help-block">:message</p>') !!}
                        </div>
                    </div>
                    <div class="form-group {{ $errors->has('emergencyphone') ? 'has-error' : ''}}">
                        {!! Form::label('emergencyphone', 'Phone:', ['class' => 'col-md-4 control-label']) !!}
                        <div class="col-md-6">
                            {!! Form::text('emergencyphone', null, ['class' => 'form-control', 'required']) !!}
                            {!! $errors->first('emergencyphone', '<p class="help-block">:message</p>') !!}
                        </div>
                    </div>

                        <div class="form-group">
                            <div class="col-md-6 col-md-offset-4">
                                <button type="submit" class="btn btn-primary">
                                    Register
                                </button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>


       @include('frontend.footer')

        <script src="{{ asset('js/front/jquery-3.1.0.min.js') }}"></script>
        <!-- Include all compiled plugins (below), or include individual files as needed -->
        <script src="https://maps.googleapis.com/maps/api/js?sensor=false" type="text/javascript"></script>
        <script src="{{ asset('js/front/gmap.js') }}"></script>
        <script src="{{ asset('js/front/bootstrap.min.js') }}"></script>
        <script src="{{ asset('js/front/owl.carousel.min.js') }}"></script>
        <script src="{{ asset('js/front/jquery.meanmenu.js') }}"></script>
        <script src="{{ asset('js/front/jquery.counterup.min.js') }}"></script>
        <script src="{{ asset('js/front/waypoints.min.js') }}" type="text/javascript"></script>
        <script src="{{ asset('js/front/active.js') }}"></script>
    </div>
</body>
</html>
