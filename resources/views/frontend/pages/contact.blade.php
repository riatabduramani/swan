<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <title>@lang('front.contact') - {{ $settings->company_name }}</title>
    
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
                        <div class="romana_page_text">
                            <h1>@lang('front.contact')</h1>
                            <ol class="breadcrumb">
                                <li><a href="{{ env('APP_URL') }}/{{ App::getLocale() }}">@lang('front.home')</a><span></span></li>
                                <li class="active"><a href="{{ env('APP_URL') }}/{{ App::getLocale() }}/contact">@lang('front.contact')</a></li>
                            </ol>
                        </div>
                    </div>
                    
                </div>
            </div>
    </section>
<!-- ==================================================
    CONTACT FORM
=================================================== -->
        <section class="romana_contact_area section_padding" style="background-image:none;">
            <div class="container ">
                <div class="row">
                    <div class="col-sm-6 col-xs-12 col-md-5">
                        <div class="romana_contact_form">
                            <form action="#">
                                <label for="contact_name">@lang('front.name')</label>
                                <input type="text" name="contact_name" id="contact_name" placeholder="@lang('front.entername')...">
                                <label for="contact_email">E-mail</label>
                                <input type="text" name="contact_email" id="contact_email" placeholder="@lang('front.enteremail')">
                                <label for="contact_phone">@lang('front.phone')</label>
                                <input type="text" name="contact_name" id="contact_phone" placeholder="@lang('front.enterphone')..">
                                <label for="contact_message">@lang('front.message')</label>
                                <textarea rows="4" placeholder="@lang('front.entermessage').." id="contact_message"></textarea>
                                <input type="submit" class="send-now" name="contact_Send" value="@lang('front.send')">
                            </form>
                        </div>
                    </div>

                    <div class="col-sm-6 col-md-5 responsive-bg col-xs-12 col-md-offset-2">
                        <div class="romana_contract_address">
                            <ul class="address">
                                <li>@lang('front.donthesitate')</li>
                                <li><a href="mailto: {{ $settings->email }} "><span class="fa fa-envelope"></span>{{ $settings->email }}</a></li>
                                <li><span class="fa fa-map-marker"></span>{{ $settings->address }}</li>
                                <li><a href="tel: {{ $settings->phone }} "><span class="fa fa-phone"></span>{{ $settings->phone }}</a></li>
                            </ul>
                            <div class="romana_socail_link">
                                <a href="{{ $settings->facebook }}" class="fa fa-facebook"></a>
                                <a href="{{ $settings->youtube }}" class="fa fa-youtube"></a>
                                <a href="{{ $settings->twitter }}" class="fa fa-twitter"></a>
                                <a href="{{ $settings->googleplus }}" class="fa fa-google"></a>
                                <a href="{{ $settings->linkedin }}" class="fa fa-linkedin"></a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>
<!-- ==================================================
    MAP LOCATION
=================================================== -->
        <div class="romana_map_area">
            <div id="googleMap"></div>
            <div class="content_bg">
                <div class="border"></div>
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