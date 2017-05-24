<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <title>My profile - {{ config('app.name') }}</title>
    
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

    <section class="">
            <div class="container">
                <div class="row">
                    <div class="col-xs-12">
                        <div class="romana_page_text">
                            <h1>Client Panel</h1>
                            <ol class="breadcrumb">
                                <li><a href="http://swan.mk">Home</a><span></span></li>
                                <li class="active"><a href="#">PANEL</a></li>
                            </ol>
                        </div>
                    </div>
                </div>
            </div>
    </section>
<!-- ==================================================
    PANEL FORM
=================================================== -->
            <div class="container">
                <div class="row" style="margin-top: 10px;">
                    <div class="col-md-3">
                          @include('frontend.panel.menu')
                    </div>
                    <div class="col-md-9">
{!! Form::model($customer, [
                            'method' => 'PATCH',
                            'url' => ['/panel/profile', $customer->id],
                            'class' => 'form-horizontal',
                            'files' => true
                        ]) !!}
{!! Form::open(['route' => ['invoice_update']]) !!}


<div class="panel panel-default">
  <div class="panel-heading">My profile</div>
  <div class="panel-body">
        <div class="form-group {{ $errors->has('name') ? 'has-error' : ''}}">
            {!! Form::label('name', 'First Name:', ['class' => 'col-md-4 control-label']) !!}
            <div class="col-md-6">

                    {!! Form::text('name', isset($customer) ? $customer->user->name : null, ['class' => 'form-control']) !!}
                    {!! $errors->first('name', '<p class="help-block">:message</p>') !!}
                
            </div>
        </div>
        <div class="form-group {{ $errors->has('surname') ? 'has-error' : ''}}">
            {!! Form::label('surname', 'Last Name:', ['class' => 'col-md-4 control-label']) !!}
            <div class="col-md-6">

                    {!! Form::text('surname', (isset($customer) ? $customer->user->surname : null), ['class' => 'form-control']) !!}
                    {!! $errors->first('surname', '<p class="help-block">:message</p>') !!}
                
            </div>
        </div>
        <div class="form-group {{ $errors->has('email') ? 'has-error' : ''}}">
            {!! Form::label('email', 'E-mail:', ['class' => 'col-md-4 control-label']) !!}
            <div class="col-md-6">
                    {!! Form::text('email', (isset($customer) ? $customer->user->email : null), ['class' => 'form-control','disabled']) !!}
                    {!! $errors->first('email', '<p class="help-block">:message</p>') !!}
                
            </div>
        </div>
        <div class="form-group {{ $errors->has('password') ? 'has-error' : ''}}">
            {!! Form::label('password', 'New Password:', ['class' => 'col-md-4 control-label']) !!}
            <div class="col-md-6">
                    {!! Form::text('password', null, ['placeholder'=>'enter new password','class' => 'form-control']) !!}
                    {!! $errors->first('password', '<p class="help-block">:message</p>') !!}
                
            </div>
        </div>
        <div class="form-group {{ $errors->has('password_confirmation') ? 'has-error' : ''}}">
            {!! Form::label('password_confirmation', 'Confirm Password:', ['class' => 'col-md-4 control-label']) !!}
            <div class="col-md-6">
                    {!! Form::text('password_confirmation', null, ['placeholder'=>'confirm new password','class' => 'form-control']) !!}
                    {!! $errors->first('password_confirmation', '<p class="help-block">:message</p>') !!}
                
            </div>
        </div>
    </div>
</div>

<div class="row">
        <div class="col-md-6">
               <div class="panel panel-default">
              <div class="panel-heading">Homeland contact:</div>
                <div class="panel-body">
                    <div class="form-group {{ $errors->has('address_in') ? 'has-error' : ''}}">
                    {!! Form::label('address_in', 'Address:', ['class' => 'col-md-3 control-label']) !!}
                        <div class="col-md-9">
                            {!! Form::textarea('address_in', $customer->address_in, ['class' => 'form-control', 'rows'=>'5']) !!}
                            {!! $errors->first('address_in', '<p class="help-block">:message</p>') !!}
                        </div>
                    </div>
                     <div class="form-group {{ $errors->has('district_in_id') ? 'has-error' : ''}}">
                    {!! Form::label('district_in_id', 'Place:', ['class' => 'col-md-3 control-label']) !!}
                        <div class="col-md-9">
                            {!! Form::select('district_in_id', $district, $customer->district_in_id, ['placeholder'=>'Select district/place...','class' => 'form-control required']) !!}
                            {!! $errors->first('district_in_id', '<p class="help-block">:message</p>') !!}
                        </div>
                    </div>
                    <div class="form-group {{ $errors->has('city_in_id') ? 'has-error' : ''}}">
                    {!! Form::label('city_in_id', 'City:', ['class' => 'col-md-3 control-label']) !!}
                        <div class="col-md-9">
                            {!! Form::select('city_in_id', $city, 1, ['class' => 'form-control']) !!}
                            {!! $errors->first('city_in_id', '<p class="help-block">:message</p>') !!}
                        </div>
                    </div>
                    <div class="form-group {{ $errors->has('country_in_id') ? 'has-error' : ''}}">
                    {!! Form::label('country_in_id', 'Country:', ['class' => 'col-md-3 control-label']) !!}
                        <div class="col-md-9">
                            {!! Form::select('country_in_id', $country, $customer->country_in_id, ['class' => 'form-control','disabled']) !!}
                            {!! $errors->first('country_in_id', '<p class="help-block">:message</p>') !!}
                        </div>
                    </div>
                    <div class="form-group {{ $errors->has('phone_in') ? 'has-error' : ''}}">
                    {!! Form::label('phone_in', 'Phone:', ['class' => 'col-md-3 control-label']) !!}
                        <div class="col-md-9">
                            {!! Form::text('phone_in', $customer->phone_in, ['class' => 'form-control']) !!}
                            {!! $errors->first('phone_in', '<p class="help-block">:message</p>') !!}
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-md-6">
            <div class="panel panel-default">
              <div class="panel-heading">Outside homeland:</div>
                <div class="panel-body">

                    <div class="form-group {{ $errors->has('address_out') ? 'has-error' : ''}}">
                        {!! Form::label('address_out', 'Address:', ['class' => 'col-md-3 control-label']) !!}
                        <div class="col-md-9">
                            {!! Form::textarea('address_out', $customer->address_out, ['class' => 'form-control','rows'=>'5']) !!}
                            {!! $errors->first('address_out', '<p class="help-block">:message</p>') !!}
                        </div>
                    </div>
                    <div class="form-group {{ $errors->has('postal_out') ? 'has-error' : ''}}">
                        {!! Form::label('postal_out', 'Postal:', ['class' => 'col-md-3 control-label']) !!}
                        <div class="col-md-9">
                            {!! Form::text('postal_out', $customer->phone_out, ['class' => 'form-control']) !!}
                            {!! $errors->first('postal_out', '<p class="help-block">:message</p>') !!}
                        </div>
                    </div>
                    <div class="form-group {{ $errors->has('city_id') ? 'has-error' : ''}}">
                        {!! Form::label('city_id', 'City:', ['class' => 'col-md-3 control-label']) !!}
                        <div class="col-md-9">
                            {!! Form::text('city', $customer->city, ['class' => 'form-control']) !!}
                            {!! $errors->first('city', '<p class="help-block">:message</p>') !!}
                        </div>
                    </div>
                    <div class="form-group {{ $errors->has('country_id') ? 'has-error' : ''}}">
                        {!! Form::label('country_id', 'Country:', ['class' => 'col-md-3 control-label']) !!}
                        <div class="col-md-9">
                            {!! Form::select('country_id', $country, $customer->country_id, ['class' => 'form-control']) !!}
                            {!! $errors->first('country_id', '<p class="help-block">:message</p>') !!}
                        </div>
                    </div>
                    <div class="form-group {{ $errors->has('phone_out') ? 'has-error' : ''}}">
                    {!! Form::label('phone_out', 'Phone:', ['class' => 'col-md-3 control-label']) !!}
                    <div class="col-md-9">
                        {!! Form::text('phone_out', $customer->phone_out, ['class' => 'form-control']) !!}
                        {!! $errors->first('phone_out', '<p class="help-block">:message</p>') !!}
                    </div>
                </div>
                </div>
             </div>
        </div>
</div>

<div class="panel panel-default">
  <div class="panel-heading">Emergency contact:</div>
    <div class="panel-body">
        <div class="form-group {{ $errors->has('emergencycontact') ? 'has-error' : ''}}">
            {!! Form::label('emergencycontact', 'Name & Last Name:', ['class' => 'col-md-4 control-label']) !!}
            <div class="col-md-6">
                {!! Form::text('emergencycontact', $customer->emergencycontact, ['class' => 'form-control']) !!}
                {!! $errors->first('emergencycontact', '<p class="help-block">:message</p>') !!}
            </div>
        </div>
        <div class="form-group {{ $errors->has('emergencyphone') ? 'has-error' : ''}}">
            {!! Form::label('emergencyphone', 'Phone:', ['class' => 'col-md-4 control-label']) !!}
            <div class="col-md-6">
                {!! Form::text('emergencyphone', $customer->emergencyphone, ['class' => 'form-control']) !!}
                {!! $errors->first('emergencyphone', '<p class="help-block">:message</p>') !!}
            </div>
        </div>
    </div>
</div>

 <div class="form-group">
                        <div class="col-md-offset-5 col-md-4">
                            {!! Form::submit('Update', ['class' => 'btn btn-primary']) !!}
                        </div>
                    </div>

{!! Form::close() !!}
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