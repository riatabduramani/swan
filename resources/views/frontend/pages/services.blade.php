<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
     <title>@lang('front.services') - {{ $settings->company_name }}</title>
    
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
    <div class="service_page">

      @include('frontend.header')

    <section class="romana_allPage_area">
            <div class="container">
                <div class="row">
                    <div class="col-xs-12">
                        <div class="romana_page_text">
                            <h1>@lang('front.services')</h1>
                            <ol class="breadcrumb">
                                <li><a href="{{ env('APP_URL') }}/{{ App::getLocale() }}">@lang('front.home')</a><span></span></li>
                                <li class="active"><a href="{{ env('APP_URL') }}/{{ App::getLocale() }}/services">@lang('front.services')</a></li>
                            </ol>
                        </div>
                    </div>
                </div>
            </div>
    </section>
<!-- ==================================================
   SERVICES
=================================================== -->
        <section class="romana_service_area">
            <div class="container">
                <div class="row">
                    @foreach($services as $service)
                    <div class="col-sm-4" id="services-list">
                        <div class="single_service text-center" id="goto{{ $service->id}}">
                            @if (App::getLocale()=='sq')
                             <h2 style="text-align:left;">{{ $service->translate('sq')->name}}</h2>
                            @else
                            <h2 style="text-align:left;">{{ $service->translate('en')->name}}</h2>
                            @endif
                            <ul>
                            <li class="service-text">
                            @if (App::getLocale()=='sq')
                            <p>{!! $service->translate('sq')->description !!}</p>
                            @else
                            <p>{!! $service->translate('en')->description !!}</p>
                            @endif
                            
                            </li>
                            <li class="service-photo">    
                               <img src="/uploads/services/{{ $service->image }}" style="border-radius: 15px;"/>
                            </li>    
                            </ul>
                        </div>
                    </div>
                    @endforeach
                </div>
            </div>
        </section>
       @include('frontend.footer')
        
        <script src="{{ asset('js/front/jquery-3.1.0.min.js') }}"></script>
        <!-- Include all compiled plugins (below), or include individual files as needed -->
        <script src="{{ asset('js/front/bootstrap.min.js') }}"></script>
        <script src="{{ asset('js/front/owl.carousel.min.js') }}"></script>
        <script src="{{ asset('js/front/jquery.meanmenu.js') }}"></script>
        <script src="{{ asset('js/front/jquery.counterup.min.js') }}"></script>
        <script src="{{ asset('js/front/waypoints.min.js') }}" type="text/javascript"></script>
        <script src="{{ asset('js/front/active.js') }}"></script>
    </div>
</body>
</html>