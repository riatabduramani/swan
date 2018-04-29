<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <title>@lang('front.about') - {{ $settings->company_name }}</title>
    
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
    <div class="about_page">
        
    @include('frontend.header')
        
    <section class="romana_allPage_area">
            <div class="container">
                <div class="row">
                    <div class="col-xs-12">
                        <div class="romana_page_text">
                            <h1>@lang('front.about')</h1>
                            <ol class="breadcrumb">
                                <li><a href="{{ env('APP_URL') }}/{{ App::getLocale() }}">@lang('front.home')</a><span></span></li>
                                <li class="active"><a href="{{ env('APP_URL') }}/{{ App::getLocale() }}/about">@lang('front.about')</a></li>
                            </ol>
                        </div>
                    </div>
                </div>
            </div>
    </section>
<!-- ==================================================
    5.*Service-Area Start 
=================================================== -->
        <section class="romana_our_story_area">
            <div class="container">
                <div class="row">
                    <div class="col-md-5 col-sm-6">
                        <div class="romana_story_img">
                            <img src="/images/swan3.png" alt="" style="margin-top:30px;">
                        </div>
                    </div>
                    <div class="col-md-6 col-md-offset-1 col-sm-6">
                        <div class="romana_story_text section_title">
                            <h2>@lang('front.fewwordsabout')</h2>
                            @if (App::getLocale()=='sq')
                            <p>{!! $pages->translate('sq')->about !!}</p>
                            @else
                            <p>{!! $pages->translate('en')->about !!}</p>
                            @endif
                            
                        </div>
                    </div>
                </div>
            </div>
        </section>
<!-- ==================================================
    4.*Explore_Area Start 
=================================================== -->
        <section class="romana_client_area">
            <div class="container">
                <div class="row">
                    <div class="col-sm-4 col-xs-12">
                        <div class="romana_client_text hero_slider">
                            <div class="romana_single_client_text section_title">
                                <h2>@lang('front.ourvision')</h2>
                            @if (App::getLocale()=='sq')
                            <p>{!! $pages->translate('sq')->vision !!}</p>
                            @else
                            <p>{!! $pages->translate('en')->vision !!}</p>
                            @endif
                            </div>
                            <div class="romana_single_client_text section_title">
                                <h2>@lang('front.ourmission')</h2>
                            @if (App::getLocale()=='sq')
                            <p>{!! $pages->translate('sq')->mission !!}</p>
                            @else
                            <p>{!! $pages->translate('en')->mission !!}</p>
                            @endif
                            </div>
                        </div>
                    </div>

                    <div class="col-sm-5 col-sm-offset-3 col-xs-12">
                        <div class="row">
                            <!--<div class="col-xs-4">
                                <div class="single_counter">
                                    <a href="#"><i class="icofont icofont-emo-simple-smile"></i></a>
                                    <h2 class="counter"></h2>
                                    <h4></h4>
                                </div>
                                <div class="single_counter">
                                    <a href="#"><i class="icofont icofont-clock-time"></i></a>
                                    <h2 class="counter"></h2>
                                    <h4></h4>
                                </div>
                            </div>

                            <div class="col-xs-4">
                                <div class="single_counter">
                                    <a href="#"><i class="icofont icofont-thumbs-up"></i></a>
                                    <h2><span class="counter"></span></h2>
                                    <h4></h4>
                                </div>
                                <div class="single_counter">
                                    <a href="#"><i class="icofont icofont-speech-comments"></i></a>
                                    <h2 class="counter"></h2>
                                    <h4></h4>
                                </div>
                            </div>

                            <div class="col-xs-4">
                                <div class="single_counter">
                                    <a href="#"><i class="icofont icofont-paper-plane"></i></a>
                                    <h2 class="counter"></h2>
                                    <h4></h4>
                                </div>
                                <div class="single_counter">
                                    <a href="#"><i class="icofont icofont-coffee-cup"></i></a>
                                    <h2 class="counter"></h2>
                                    <h4></h4>
                                </div>
                            </div>-->

                        </div>
                    </div>
                </div>
            </div>
        </section>
<!-- ==================================================
    WHY US
=================================================== -->
        <section class="romana_team_area section_padding">
            <div class="container">
                <div class="row">
                    <div class="col-xs-12">
                        <div class="section_title">
                            <h2>@lang('front.whyus')</h2>
                        </div>
                    </div>
                </div>

                <div class="row">
                    <div class="col-xs-12">
                        <div class="team_slider section_padding_top">
                        @foreach($why as $we)
                            <div class="single_staff">
                                <!--<a href="#"><img src="images/img1.jpg" alt=""></a>-->
                            @if (App::getLocale()=='sq')
                            <a href="#"><h3>{{ $we->translate('sq')->title }}</h3></a>
                            <p>{{ $we->translate('sq')->description }}</p>
                            @else
                            <a href="#"><h3>{{ $we->translate('en')->title }}</h3></a>
                            <p>{{ $we->translate('en')->description }}</p>
                            @endif
                                
                            </div>
                        @endforeach
                        </div>
                    </div>
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