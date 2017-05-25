<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <title>@lang('front.clientpanel') - {{ $settings->company_name }}</title>
    
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
                                <li class="active"><a href="#">@lang('front.paneldashboard')</a></li>
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
                        <h3>@lang('front.welcome') <b>{{ Auth::user()->name }} {{ Auth::user()->surname }}</b></h3>
                        <small>@lang('front.since'): {{ date('d.m.Y', strtotime(Auth::user()->created_at)) }}</small>

                        <table class="table table-bordered" style="margin-top: 20px;margin-bottom: 20px;">
                        @if($chosenpacket)
                            <tr>
                                <td width="140px">@lang('front.chosenpacket'):</td>
                                <td style="color: #000; font-size: 1.2em; font-weight: bold">{{ $chosenpacket->packet->name }}</td>
                            </tr>
                            <tr>
                                <td>@lang('front.packetexpire'):</td>
                                <td style="color: #000; font-weight: bold">{{ date('d.m.Y', strtotime($chosenpacket->end)) }}</td>
                            </tr>
                        @else

                            <tr>
                                <td width="140px">@lang('front.chosenpacket'):</td>
                                <td style="color: #000; font-size: 1.2em; font-weight: bold">@lang('front.nopacket')</td>
                            </tr>
                        @endif
                            <tr>
                                <td>@lang('front.availablecredits'):</td>
                                @if(Auth::user()->customer->credits->sum('balance') >= 0)
                                <td><b>{{ Auth::user()->customer->credits->sum('balance') }} &euro;</b></td>
                                @else
                                <td><b style="color: red">{{ Auth::user()->customer->credits->sum('balance') }} &euro;</b></td>
                                @endif
                            </tr>

                        </table>

                        <h3>@lang('front.unpaidinvoices')</h3>
                        <table class="table table-bordered" style="margin-top: 20px;margin-bottom: 20px;">
                            <thead>
                                <tr>
                                    <th>
                                        @lang('front.invoice') #
                                    </th>
                                    <th>
                                        @lang('front.invoicestatus')
                                    </th>
                                    <th>
                                        @lang('front.issuedate')
                                    </th>
                                    <th>
                                        @lang('front.duedate')
                                    </th>
                                    <th>@lang('front.action')</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach($unpaidinvoice as $inv)
                                    <tr>
                                        <td>@lang('front.invoice') #{{$inv->id}}/{{date('Y', strtotime($inv->invoice_date))}}</td>
                                        <td>{!! $inv->showPaidStatus($inv) !!}</td>
                                        <td>{{ date('d.m.Y', strtotime($inv->invoice_date))}}</td>
                                        <td>{{ date('d.m.Y', strtotime($inv->due_date))}}</td>
                                        <td><a href="/panel/invoices/{{$inv->id}}"><i class="fa fa-search" aria-hidden="true"></i> @lang('front.view')</a></td>
                                    </tr> 
                                @endforeach
                            </tbody>

                        </table>

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