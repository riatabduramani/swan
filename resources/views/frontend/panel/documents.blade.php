<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <title>@lang('front.documents') - {{ $settings->company_name }}</title>
    
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
                        <h1>@lang('front.clientpanel')</h1>
                        <ol class="breadcrumb">
                            <li><a href="{{ env('APP_URL')}}/{{ App::getLocale() }}/panel">@lang('front.home')</a><span></span></li>
                            <li class="active"><a href="#">@lang('front.documents')</a></li>
                        </ol>
                    </div>
                </div>
            </div>
        </div>
    </section>
<!-- ==================================================
    PANEL FORM
=================================================== -->
            <div class="container" style="color: #000;">
                <div class="row" style="margin-top: 10px;">
                    <div class="col-md-3">
                          @include('frontend.panel.menu')
                    </div>
                    <div class="col-md-7">
                        <h3>@lang('front.documents')</h3>
                        <br />
                       <div class="list-group">
                       @if($customer->document->count() == 0)
                            @lang('front.nodocuments')
                       @else

                       @foreach($customer->document as $document)

                       @if($document->type == 2)

                            <a href="/public/uploads/documents/{{ $document->renamed }}" target="_blank" class="list-group-item" download="http://swan.mk/public/uploads/documents/239-12-01-2018-1.jpg"> 

                                
                               <span class="badge">
                                    
                                    <i class="fa fa-download" aria-hidden="true"></i>
                               </span>
                               <div class="pull-right" style="margin-right: 10px;">
                                    @if($document->extension == 'jpg')
                                        <img src="/public/uploads/documents/{{ $document->renamed }}" width="50" height="50" />
                                      @else
                                        <img src="/public/images/pdf-icon.png" width="50" height="50" />
                                      @endif
                                </div>
                            <h4 class="list-group-item-heading"><small>{{ date('d.m.Y', strtotime($document->created_at)) }}</small> {{ $document->name }}</h4>
                            <p class="list-group-item-text">{{ $document->description }}</p>
                        </a> 

                        @endif
                        @endforeach
                        @endif
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